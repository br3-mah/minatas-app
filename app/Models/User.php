<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'mname',
        'fname',
        'lname',
        'phone',
        'phone2',
        'address',
        'address2',
        'email',
        'nrc',
        'nrc_no',
        'dob',
        'gender',
        'password',
        'ministry',
        'department',
        'about_me',
        'usource',
        // ---------------- configs --------
        'loan_status',
        'id_type',
        'opt_code',
        'opt_verified',
        // ---------------- Employer ---------
        'employer',
        'employeeNo',
        'empaddress',
        'empemail',
        'empphone',
        'occupation',
        'basic_pay',
        'net_pay',
        // --------------- Next of Kin -------
        'nokfname',
        'noklname',
        'nokphone',
        'nokemail',
        'nokdob',
        'nokaddress',
        'nokgender',
        'noknrc',
        'nokrelation',
        'nokoccupation'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'borrowed_total'
        // 'create_token'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($application) {
            $application->uuid = static::generateNumericUUID(5); // Generate 5-digit numeric UUID
        });
    }

    protected static function generateNumericUUID($length = 5)
    {
        $digits = '0123456789';
        $uuid = '';
        for ($i = 0; $i < $length; $i++) {
            $uuid .= $digits[rand(0, strlen($digits) - 1)];
        }
        return $uuid;
    }

    public function getCreateTokenAttribute()
    {
        $token = $this->tokens()->create([
            'name' => $this->fname.'btf_token'.$this->email,
            'token' => hash('sha256', $plainTextToken = Str::random(40)),
            'abilities' => ['*'],
        ]);
        return new NewAccessToken($token, $token->getKey().'|'.$plainTextToken);
    }


    public function getBorrowedTotalAttribute()
    {
        $loans = Application::where('user_id', $this->id)
            ->where('complete', 1)
            ->where('status', 1)->sum('amount');
        return $loans ?? 0;
    }


    public static function meta(){
        return User::where('id', auth()->user()->id)->with([
            'uploads',
            'next_of_king',
            'party',
            'bank'])->first();
    }

    public static function user_meta($id){
        return User::where('id', $id)->with(['uploads', 'next_of_king', 'refs','bank'])->first()->toArray();

    }

    public static function totalCustomerBorrowed($user){
        $loans = Application::where('user_id', $user->id)
        ->where('complete', 1)
        ->where('status', 1)->sum('amount');
        return $loans ?? 0;
    }

    public static function totalBorrowers(){
        return User::role('user')->count();
    }

    public static function totalIncompleteKYCBorrowers(){
        return Application::where('complete', 1)->count();
    }

    public function nextkin(){
        return $this->hasMany(NextOfKing::class);
    }
    public function loanpackages(){
        return $this->hasMany(LoanPackage::class);
    }
    public function WithdrawRequest(){
        return $this->hasMany(WithdrawRequest::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function loan_scores()
    {
        return $this->hasMany(LoanScore::class);
    }

    public function blacklist(){
        return $this->hasOne(BlackList::class);
    }

    public function wallet(){
        return $this->hasMany(Wallet::class);
    }

    public function loans(){
        return $this->hasMany(Application::class)->orderBy('created_at', 'desc');
    }

    public function active_loans(){
        return $this->hasOne(Application::class)->where('status', 1)->where('complete', 1);
    }

    public function next_of_king()
    {
        return $this->hasMany(NextOfKing::class)->orderBy('created_at', 'desc');
    }

    public function refs()
    {
        return $this->hasMany(References::class)->orderBy('created_at', 'desc');
    }

    public function bank()
    {
        return $this->hasMany(BankDetails::class)->orderBy('created_at', 'desc');
    }

    public function nrc_photos()
    {
        return $this->hasMany(NRCPhoto::class)->orderBy('created_at', 'desc');
    }

    public function uploads(){
        return $this->hasMany(UserFile::class);
    }

    public function loan_notifications(){
        return $this->hasMany(LoanNotification::class);
    }

    public function photos(){
        return $this->hasMany(UserPhoto::class);
    }

    public function guarantors(){
        return $this->hasMany(Guarantor::class);
    }

    public function party(){
        return $this->hasMany(RelatedParty::class);
    }

    public function assigned_loans(){
        return $this->hasMany(LoanManualApprover::class);
    }
    public function tickets(){
        return $this->belongsTo(Ticket::class);
    }
}
