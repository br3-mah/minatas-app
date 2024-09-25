<div class="col-xl-4 col-sm-6">
    <a href="{{ route('loan-details', ['id' => $my_loan->id]) }}" class="card bg-warning">
      <div class="card-body">
        <div class="d-flex faq-widgets">
          <div class="flex-grow-1">
            <h5>Pending for Review</h5>
            <p>Your application is currently pending review. Our team is carefully assessing your information to ensure everything is in order. You will be notified once a decision has been made. Thank you for your patience!</p>
          </div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
        </div>
      </div>
    </a>
  </div>