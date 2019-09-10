<!-- s-footer
================================================== -->
<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-six tab-full s-footer__about">

                <h4>About Wordsmith</h4>

                <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut
                    occaecati placeat at.
                    Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia
                    consequatur.
                    Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et
                    enim exercitationem ipsam. Culpa error
                    temporibus magnam est voluptatem.</p>

            </div> <!-- end s-footer__about -->

            <div class="col-six tab-full s-footer__subscribe">

                <h4>Our Newsletter</h4>

                <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et
                    enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="EMAIL" class="email" id="mc-email"
                               placeholder="Email Address" required="">

                        <input type="submit" name="subscribe" value="Send">

                        <label for="mc-email" class="subscribe-message"></label>

                    </form>
                </div>

            </div> <!-- end s-footer__subscribe -->

        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">

            <div class="col-six">
                <ul class="footer-social">
                    <div class="social-buttons">
                    @include('guest.layouts.share', [
                            'url' => request()->fullUrl(),
                            'description' => 'This is really cool link',
                            'image' => 'https://placehold.it/300x300?text=Cool+link'
                        ])
                    <li>
                        <a href="#0"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fab fa-pinterest"></i></a>
                    </li>
            </div>

            {{--                    <li>--}}
{{--                        <a href="#0"><i class="fab fa-twitter"></i></a>--}}
{{--                    </li>--}}

                </ul>
            </div>

            <div class="col-six">
                <div class="s-footer__copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
                                class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                                                                  target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                </div>
            </div>

        </div>
    </div> <!-- end s-footer__bottom -->

    <div class="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top"></a>
    </div>

</footer> <!-- end s-footer -->


<!-- Java Script
================================================== -->
<script src="storage/wordsmith/js/jquery-3.2.1.min.js"></script>
<script src="storage/wordsmith/js/plugins.js"></script>
<script src="storage/wordsmith/js/main.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function (e) {

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width=' + popupSize.width + ',height=' + popupSize.height +
            ',left=' + verticalPos + ',top=' + horisontalPos +
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
</body>

</html>
