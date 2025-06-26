<!--</div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>6363487541</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>abc@gmail.com</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>Laundry Hub Dharwad</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>-->

  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="Template/Template/assets/js/isotope.min.js"></script>
    <script src="Template/Template/assets/js/owl-carousel.js"></script>
    <script src="Template/Template/assets/js/lightbox.js"></script>
    <script src="Template/Template/assets/js/tabs.js"></script>
    <script src="Template/Template/assets/js/video.js"></script>
    <script src="Template/Template/assets/js/slick-slider.js"></script>
    <script src="Template/Template/assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>