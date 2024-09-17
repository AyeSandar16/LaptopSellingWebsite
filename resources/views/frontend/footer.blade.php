<footer class="py-16 text-center text-sm text-black dark:text-white/70">
    <table class="table">
        <tr><td class="about col-8">
            <h6>About Us</h6>
            <p>Welcome to Next Gen Laptops, your number one source for the latest and greatest in laptop technology. We're dedicated to providing you the very best laptops with an emphasis on quality, customer service, and affordability.</p>
            <p>Founded in 2023, Next Gen Laptops has come a long way from its beginnings. When we first started out, our passion for high-performance laptops drove us to start our own business. We saw a gap in the market for a reliable, customer-focused online laptop store, and we set out to fill that gap.</p>
            <p> Our mission is to make technology accessible and affordable for everyone. We understand that in today's fast-paced world, a reliable laptop is essential for work, education, and entertainment. That's why we offer a wide range of laptops to suit every need and budget, from high-end gaming rigs to budget-friendly student laptops.</p>
            <p>What sets us apart from the competition is our commitment to our customers. We pride ourselves on our excellent customer service, with a dedicated team available to help you choose the perfect laptop, answer your questions, and resolve any issues you might encounter. We also offer fast and secure shipping, easy returns, and a comprehensive warranty on all our products.</p>
            <p> At Next Gen Laptops, we're not just about selling laptops; we're about creating a community of tech enthusiasts who are passionate about the latest innovations and trends in the laptop industry. We regularly update our blog with buying guides, product reviews, and tech tips to help you make informed decisions and get the most out of your new laptop.</p>
            <p>Thank you for choosing Next Gen Laptops. We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
        </td>
        <td><ul class="fqa">
            <li style="font-weight: 500">Help and FQAs</li>
            <li><a href="{{route('home.about')}}">About</a> </li>
            <li><a href="">Terms</a> </li>
            <li><a href="">Career</a> </li>
            <li><a href="{{route('home.contact')}}">Contact</a> </li>
        </ul></td>
        </tr>
        <tr>
            <td>Copyright &copy; 2024 nextgenlaptops.com.mm</td>
            <td>
                <div style="font-weight: 500">Follow Us</div>
                @php
                $settings = DB::table('settings')->get();
                @endphp
                @foreach ($settings as $setting )


                <a href="{{$setting->facebook}}" target="_blank"><span><img src="{{asset('images/logo/facebook (2).png')}}" alt="facebook" width="40px" height="40px"></span></a>
                <a href="{{$setting->youtube}}" target="_blank"><span><img src="{{asset('images/logo/youtube.png')}}" alt="youtube" width="40px" height="40px"></span></a>
                <a href="{{$setting->instagram}}" target="_blank"><span><img src="{{asset('images/logo/instagram.png')}}" alt="instagram" width="40px" height="40px"></span></a>
                <a href="{{$setting->twitter}}" target="_blank"><span><img src="{{asset('images/logo/twitter (1).png')}}" alt="twitter" width="40px" height="40px"></span></a>
                @endforeach
              </td>
        </tr>
    </table>
</footer>
</div>
</div>
</div>
</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Plus button click
        var plusButtons = document.querySelectorAll('.button.plus');
        plusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var inputField = this.closest('.input-group').querySelector('.input-number');
                var currentValue = parseInt(inputField.value);
                var maxValue = parseInt(inputField.getAttribute('data-max'));

                if (currentValue < maxValue) {
                    inputField.value = currentValue + 1;
                }
            });
        });

        // Minus button click
        var minusButtons = document.querySelectorAll('.button.minus');
        minusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var inputField = this.closest('.input-group').querySelector('.input-number');
                var currentValue = parseInt(inputField.value);
                var minValue = parseInt(inputField.getAttribute('data-min'));

                if (currentValue > minValue) {
                    inputField.value = currentValue - 1;
                }
            });
        });


    });
</script>

