     @extends('webapp_layout.master')
     @section('content')
         <header class="header header-fixed">
             <div class="container">
                 <div class="header-content">
                     <div class="left-content">
                         <a href="javascript:void(0);" class="back-btn"><i class="icon feather icon-chevron-right"></i></a>
                         <h6 class="title">یافت نشد</h6>
                     </div>
                     <div class="mid-content"></div>
                     <div class="right-content"></div>
                 </div>
             </div>
         </header>
         <div class="page-content space-top">
             <div class="container">
                 <div class="error-page">
                     <div class="icon-bx"><img src="assets/images/error2.svg" alt=""></div>
                     <div class="clearfix">
                         <h2 class="title text-primary">متاسفیم</h2>
                         <p>محتوای درخواست شده یافت نشد.</p>
                     </div>
                 </div>
                 <div class="error-img"><img src="assets/images/error.png" alt=""></div>
             </div>
         </div>
     @endsection
