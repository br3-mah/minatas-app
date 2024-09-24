<style>

.h-[calc(100vh-60px)] {
    height: calc(100vh - 60px);
}

.relative {
    position: relative;
}

.overflow-y-auto {
    overflow-y: auto;
}

.overflow-x-hidden {
    overflow-x: hidden;
}

.p-4 {
    padding: 24px;
}

.space-y-4 > * + * {
    margin-top: 24px;
}

/* Breadcrumb styles */
.detached-breadcrumb {
    list-style-type: none;
    padding: 0;
}

.text-xl {
    font-size: 1.5rem;
    color: #2c7a54;
}

.font-semibold {
    font-weight: 600;
}

/* Card styles */
.grid {
    display: grid;
}

.grid-cols-1 {
    grid-template-columns: repeat(1, minmax(0, 1fr));
}

.gap-4 {
    gap: 24px;
}

.bg-white {
    background-color: #ffffff;
}

.border {
    border: 1px solid;
}

.rounded {
    border-radius: 0.5rem;
}

.border-black\/10 {
    border-color: rgba(44, 122, 84, 0.1);
}

/* Profile header styles */
.bg-light {
    background-color: #e8f5e9;
}

.bg-cover {
    background-size: cover;
}

.h-20 {
    height: 8rem;
}

.rounded-lg {
    border-radius: 0.75rem;
}

.bg-center {
    background-position: center;
}

/* Profile content styles */
.px-10 {
    padding-left: 2.5rem;
    padding-right: 2.5rem;
}

.-mt-16 {
    margin-top: -5rem;
}

.flex {
    display: flex;
}

.items-center {
    align-items: center;
}

.justify-between {
    justify-content: space-between;
}

.gap-5 {
    gap: 1.5rem;
}

/* Profile image styles */
.w-32 {
    width: 10rem;
}

.h-32 {
    height: 10rem;
}

.rounded-full {
    border-radius: 50%;
}

.border-8 {
    border-width: 8px;
}

.border-light\/50 {
    border-color: rgba(232, 245, 233, 0.5);
}

/* Edit button styles */
.btn {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: all 0.3s;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.bg-purple {
    background-color: #2c7a54;
}

.text-white {
    color: #ffffff;
}

.btn:hover {
    background-color: #1e5e3f;
    transform: translateY(-2px);
}

/* Profile details styles */
.flex-col {
    flex-direction: column;
}

.md\:flex-row {
    flex-direction: row;
}

.text-muted {
    color: #6b7280;
}

/* Grid for profile details */
.md\:grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
}

/* Additional styles for a classy look */
h3 {
    color: #2c7a54;
    font-size: 1.25rem;
    margin-bottom: 1rem;
    border-bottom: 2px solid #2c7a54;
    padding-bottom: 0.5rem;
}

.grid p {
    margin-bottom: 0.5rem;
}

.font-semibold {
    color: #2c7a54;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .px-10 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .w-32, .h-32 {
        width: 8rem;
        height: 8rem;
    }
}
</style>
<div class="h-[calc(100vh-60px)]  relative overflow-y-auto overflow-x-hidden p-4 space-y-4 detached-content">
    <!-- Start Breadcrumb -->
    <div>
        <nav class="w-full">
            <ul class="space-y-2 detached-breadcrumb">
                <li class="text-xl font-semibold text-black dark:text-white">Profile</li>
            </ul>
        </nav>
    </div>
    <!-- End Breadcrumb -->
    
    <!-- Start All Card -->
    <div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">
        <div class="grid grid-cols-1 gap-4">
            <div class="p-5 bg-white border rounded border-black/10 dark:bg-darklight dark:border-darkborder">
                <div class="bg-light bg-cover h-20 rounded-lg bg-center"></div>
                <div class="relative px-10 -mt-16">
                    <div class="flex items-center justify-between gap-5">
                        @php
                            if (!function_exists('getUserProfilePhoto')) {
                                function getUserProfilePhoto($user)
                                {
                                    if (!empty(auth()->user()->photos->toArray())) {
                                        $photo = auth()->user()->photos[0];

                                        // Check the source of the photo
                                        if ($photo->source == 'admin') {
                                            return url('public/storage/' . $photo->path);
                                        } else {
                                            return 'https://app.capexfinancialservices.org/' . $photo->path;
                                        }
                                    }

                                    // Return default avatar if no photo is found
                                    return asset('public/app/img/user.avif');
                                }
                            }
                        @endphp
                        <div class="relative w-32 h-32">
                            <img width="150" src="{{ getUserProfilePhoto(auth()->user()) }}" class="border-8 rounded-full border-light/50" alt="{{ auth()->user()->fname }}">
                            <span class="absolute w-5 h-5 rounded-full bg-success bottom-2 ltr:right-4 rtl:left-4"></span>
                        </div>                        
                        <div>
                            <a href="{{ route('kyc-update', ['view' => 'profile']) }}" class="btn bg-purple border border-purple rounded-md text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]">Edit</a>
                        </div>
                    </div>
                    <div class="flex flex-col items-start justify-between md:flex-row gap-7">
                        <div class="mt-4 shrink-0">
                            <div>
                                <h5 class="text-xl font-bold dark:text-white">{{ auth()->user()->fname.' '.auth()->user()->lname }}</h5>
                                <p class="text-muted dark:text-darkmuted">{{ 'Customer' }}</p>
                            </div>
                            <div class="flex flex-wrap items-start gap-5 mt-7">
                                <div>
                                    <p class="text-base font-bold dark:text-white">{{ '0' }}</p>
                                    <p class="text-muted dark:text-darkmuted">Total <br>Loans Recieved</p>
                                </div>
                                <div>
                                    <p class="text-base font-bold dark:text-white">{{ '0' }}</p>
                                    <p class="text-muted dark:text-darkmuted">Total <br>Amount Recieved</p>
                                </div>
                                <div>
                                    <p class="text-base font-bold dark:text-white">{{ '0' }}</p>
                                    <p class="text-muted dark:text-darkmuted">Current <br>Amount Owing </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-xl font-bold dark:text-white">About Me</h3>
                            <p class="max-w-4xl mt-5 text-base text-muted dark:text-darkmuted">
                               {{ auth()->user()->about_me ?? 'No Info' }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-12">
                        <h3 class="mb-4 text-xl text-muted font-bold dark:text-white">More Details</h3>
                        <div class="bg-white dark:bg-gray-800">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="font-semibold">First Name:</p>
                                    <p>{{ auth()->user()->fname }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Last Name:</p>
                                    <p>{{ auth()->user()->lname }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Phone:</p>
                                    <p>{{ auth()->user()->phone }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Address:</p>
                                    <p>{{ auth()->user()->address }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Secondary Address:</p>
                                    <p>{{ auth()->user()->address2 }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Email:</p>
                                    <p>{{ auth()->user()->email }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">National ID Type:</p>
                                    <p>{{ auth()->user()->id_type }} Card</p>
                                </div>
                                <div>
                                    <p class="font-semibold">NRC Number:</p>
                                    <p>{{ auth()->user()->nrc_no }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Date of Birth:</p>
                                    <p>{{ auth()->user()->dob }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Gender:</p>
                                    <p>{{ auth()->user()->gender }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Ministry:</p>
                                    <p>{{ auth()->user()->ministry }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Department:</p>
                                    <p>{{ auth()->user()->department }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin First Name:</p>
                                    <p>{{ auth()->user()->nokfname }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin Last Name:</p>
                                    <p>{{ auth()->user()->noklname }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin Phone:</p>
                                    <p>{{ auth()->user()->nokphone }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin Email:</p>
                                    <p>{{ auth()->user()->nokemail }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin Date of Birth:</p>
                                    <p>{{ auth()->user()->nokdob }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin Address:</p>
                                    <p>{{ auth()->user()->nokaddress }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin Gender:</p>
                                    <p>{{ auth()->user()->nokgender }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin NRC:</p>
                                    <p>{{ auth()->user()->noknrc }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin Relation:</p>
                                    <p>{{ auth()->user()->nokrelation }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Next of Kin Occupation:</p>
                                    <p>{{ auth()->user()->nokoccupation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End All Card -->

</div>