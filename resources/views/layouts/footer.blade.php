<footer class="footer text-center ww-100">
   <div class="text-center p-3 bg-dark text-white" style="min-height:50px;">
      <div class="container">
         <div class="row">
            <div class="col-sm">
               <h3>ELECTRIFY</h3>

            </div>

            <div class="col-sm">
               <h3>FOLLOW US</h3>
               <ul style="margin-left: 100px; text-align: left">
                  <li>
                     <a href="https://www.facebook.com/" class="d-flex gap-2 text-decoration-none text-white">
                        <i>
                           <img src="{{ asset('images/facebooklogo.png') }}" class="rounded-circle" height="30px"
                              width="30px" alt="Facebook.png">
                        </i>
                        <div class="fw-bold" style="margin-left: 5px;">Facebook</div>
                     </a>
                  </li>
                  <li>
                     <a href="https://www.twitter.com/" class="d-flex gap-2 text-decoration-none text-white">
                        <i>
                           <img src="{{ asset('images/twitterlogo.png') }}" class="rounded-circle" height="30px"
                              width="30px" alt="Twitter.png">
                        </i>
                        <div class="fw-bold" style="margin-left: 5px;">Twitter</div>
                     </a>
                  </li>
                  <li>
                     <a href="https://www.instagram.com/" class="d-flex gap-2 text-decoration-none text-white">
                        <i>
                           <img src="{{ asset('images/instagramlogo.png') }}" class="rounded-circle" height="30px"
                              width="30px" alt="Instagram.png">
                        </i>
                        <div class="fw-bold" style="margin-left: 5px;">Instagram</div>
                     </a>
                  </li>
               </ul>
            </div>

            <div class="col-sm">
               <h3>ABOUT US</h3>
               <p class="text-justify">Electrify is a place that provides various kinds of electronic goods that
                  you're looking for
                  starting from laptops to keyboards.</p>
            </div>
         </div>
         <hr>
         <p class="copyright">©Electrify {{ now()->year }}</p>
      </div>
   </div>
</footer>
