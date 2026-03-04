@extends('Site.layout.tamplate')

@section('content')

<style>
/* =========================
   CONTACT US – FOODMART STYLE
   ========================= */

.contact-section{
    background:#f7f7f7;
    padding:60px 0;
}

.contact-box{
    background:#fff;
    border-radius:12px;
    padding:40px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

.contact-title{
    font-size:28px;
    font-weight:700;
    margin-bottom:10px;
    color:#222;
}

.contact-subtitle{
    color:#777;
    margin-bottom:30px;
}

/* Input Fields */
.form-control{
    height:50px;
    border-radius:8px;
    border:1px solid #ddd;
    padding-left:15px;
    box-shadow:none;
    transition:.3s;
}

.form-control:focus{
    border-color:#28a745;
    box-shadow:0 0 0 0.1rem rgba(40,167,69,.15);
}

/* Textarea */
textarea.form-control{
    height:140px;
    resize:none;
}

/* Button */
.btn-contact{
    background:#28a745;
    color:#fff;
    border:none;
    padding:12px 35px;
    border-radius:8px;
    font-weight:600;
    transition:.3s;
}

.btn-contact:hover{
    background:#218838;
}

/* Contact Info */
.contact-info{
    padding:40px;
    color:#fff;
    border-radius:12px;
    height:100%;
    background:linear-gradient(135deg,#28a745,#20c997);
}

.contact-info h4{
    font-weight:700;
    margin-bottom:20px;
}

.contact-info p{
    margin-bottom:12px;
}

</style>

<section class="contact-section">
    <div class="container">
        <div class="row">

            <!-- CONTACT FORM -->
            <div class="col-lg-8 mb-4">
                <div class="contact-box">

                    <h2 class="contact-title">Contact Us</h2>
                    <p class="contact-subtitle">
                        Have questions about our products? Send us a message.
                    </p>

                    <form action="{{route('post.contactus')}}" method="POST">
                        @csrf

                        <div class="row">

                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Enter your name"
                                       >
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Enter your email"
                                       >
                            </div>

                            <!-- Message -->
                            <div class="col-12 mb-3">
                                <label>Message</label>
                                <textarea name="message"
                                          class="form-control"
                                          placeholder="Write your message..."
                                          ></textarea>
                            </div>

                            <!-- Button -->
                            <div class="col-12">
                                <button type="submit" class="btn-contact">
                                    Send Message
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <!-- CONTACT INFO SIDE -->
            <div class="col-lg-4">
                <div class="contact-info">

                    <h4>FoodMart Info</h4>

                    <p><strong>Address:</strong><br>
                        Pokhara, Nepal
                    </p>

                    <p><strong>Email:</strong><br>
                        support@foodmart.com
                    </p>

                    <p><strong>Phone:</strong><br>
                        +977-9800000000
                    </p>

                    <p><strong>Opening Hours:</strong><br>
                        Sun – Sat : 8 AM – 9 PM
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
