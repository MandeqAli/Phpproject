<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Mecura - Modern Pharmacy</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ✅ NAVBAR CSS (from app page) -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<!-- ✅ NAVBAR (copied from app page) -->
<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm fixed-top">

    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
            Pharma<span>Store</span>
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto gap-4">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Product</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <a class="btn btn-dark rounded-pill px-4" href="#">Get Started</a>
        </div>
    </div>
</nav>

<!-- ✅ YOUR CONTACT PAGE (unchanged) -->
<div class="page-wrapper">
    <div class="container">

        <div class="brand-header">
            <div class="logo">
                <i class="fas fa-notes-medical"></i> <span>Mecura</span>
            </div>
        </div>

        <section class="mecura-contact-card">
            <div class="contact-left">
                <div class="pharmacist-mini">
                    <img src="{{ asset('images/hero-doctor.png') }}" alt="Mecura Pharmacist">
                </div>
                <h1>Mecura<br>Pharmacy</h1>
                <p class="brand-desc">
                    Providing operational healthiness and clinically tested medical solutions for over 20 years.
                    Your health is our priority.
                </p>

                <div class="contact-details">
                    <div class="detail-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <p class="label">Support Email</p>
                            <p class="value">Naima@gmail.com</p>
                        </div>
                    </div>

                    <div class="detail-item">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <p class="label">Quick Contact</p>
                            <p class="value">+252611190772</p>
                        </div>
                    </div>

                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <p class="label">Headquarters</p>
                            <p class="value">Degmadda Hodan ka soo horjeedka Hayat Market</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-right">
                <h2>Send a Message</h2>
                <p class="form-sub">We'll get back to you within 2-4 business hours.</p>

                <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                    @csrf

                    <div class="input-row">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" id="name" name="name" placeholder="Name" required value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" id="email" name="email" placeholder="@gmail.com" required value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>How can we help?</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tell us about your pharmacy needs..." required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="mecura-btn" id="submitBtn">
                        Submit Request <i class="fas fa-paper-plane"></i>
                    </button>

                    <p id="formStatus" style="margin-top:10px;"></p>
                </form>
            </div>
        </section>

    </div>
</div>

<script>
  const form = document.getElementById('contactForm');
  const submitBtn = document.getElementById('submitBtn');
  const formStatus = document.getElementById('formStatus');

  form.addEventListener('submit', async function(e) {
    e.preventDefault();

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const payload = {
      name: document.getElementById('name').value,
      email: document.getElementById('email').value,
      message: document.getElementById('message').value
    };

    submitBtn.disabled = true;
    formStatus.className = '';
    formStatus.innerText = 'Sending...';

    try {
      const res = await fetch("{{ route('contact.submit') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': token,
          'Accept': 'application/json'
        },
        body: JSON.stringify(payload)
      });

      const result = await res.json();

      if (result.success) {
        formStatus.innerText = result.message;
        formStatus.classList.add('success');
        form.reset();
      } else {
        formStatus.innerText = result.message || 'Validation error';
        formStatus.classList.add('error');
      }
    } catch (err) {
      formStatus.innerText = 'Something went wrong. Please try again.';
      formStatus.classList.add('error');
    } finally {
      submitBtn.disabled = false;
    }
  });
</script>

<!-- ✅ NAVBAR JS (from app page) -->
<script src="{{ asset('Bootstrap/bootstrap.bundle.js') }}"></script>

</body>
</html>
