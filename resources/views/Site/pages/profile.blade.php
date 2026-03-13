@extends('Site.layout.tamplate')
@section('content')

  
    <style>
        body{
            font-family:'Roboto',sans-serif;
            background:#f5f6f8;
        }

        /* HEADER BAR (Footmart style) */
        .profile-header{
            background:#1f2937;
            color:#fff;
            padding:18px 30px;
            font-size:20px;
            font-weight:500;
        }

        /* MAIN CARD */
        .profile-card{
            background:#fff;
            border-radius:10px;
            box-shadow:0 6px 20px rgba(0,0,0,0.08);
            margin-top:30px;
            overflow:hidden;
        }

        /* LEFT SIDEBAR */
        .profile-sidebar{
            background:#111827;
            color:#fff;
            padding:30px 20px;
            text-align:center;
            height:100%;
        }

        .profile-sidebar img{
            width:120px;
            height:120px;
            border-radius:50%;
            object-fit:cover;
            border:4px solid #f97316; /* orange accent */
            margin-bottom:15px;
        }

        .profile-sidebar h5{
            margin-top:10px;
            font-weight:600;
        }

        .profile-sidebar p{
            font-size:13px;
            opacity:.8;
        }

        /* MENU */
        .profile-menu{
            margin-top:25px;
            text-align:left;
        }

        .profile-menu a{
            display:block;
            padding:10px 14px;
            color:#d1d5db;
            text-decoration:none;
            border-radius:6px;
            margin-bottom:6px;
            transition:.25s;
            font-size:14px;
        }

        .profile-menu a:hover{
            background:#f97316;
            color:#fff;
        }

        /* RIGHT CONTENT */
        .profile-content{
            padding:35px;
        }

        .section-title{
            font-weight:600;
            margin-bottom:25px;
            color:#111827;
        }

        .info-box{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:14px 18px;
            border:1px solid #e5e7eb;
            border-radius:8px;
            margin-bottom:12px;
            background:#fafafa;
            transition:.25s;
        }

        .info-box:hover{
            border-color:#f97316;
            background:#fff7ed;
        }

        .info-title{
            font-weight:500;
            color:#6b7280;
        }

        .info-value{
            font-weight:600;
            color:#111827;
        }

        /* BUTTON */
        .edit-btn{
            background:#f97316;
            color:#fff;
            padding:10px 22px;
            border-radius:6px;
            text-decoration:none;
            font-weight:500;
            display:inline-block;
            margin-top:15px;
            transition:.25s;
        }

        .edit-btn:hover{
            background:#ea580c;
            color:#fff;
        }

        @media(max-width:768px){
            .profile-content{
                padding:25px;
            }
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="profile-header">
    <i class="fa fa-user-circle me-2"></i> My Account
</div>

<div class="container">

    <div class="profile-card">
        <div class="row g-0">

            <!-- SIDEBAR -->
            <div class="col-md-3 profile-sidebar">

                <img src="{{ asset('storage/photos/'.Auth::user()->image) }}" alt="Profile">

                <h5>{{ Auth::user()->name }}</h5>
                <p>{{ Auth::user()->email }}</p>

                <div class="profile-menu">
                    <a href="#"><i class="fa fa-user me-2"></i> Profile</a>
                    <a href="#"><i class="fa fa-shopping-bag me-2"></i> Orders</a>
                    <a href="#"><i class="fa fa-heart me-2"></i> Wishlist</a>
                    <a href="#"><i class="fa fa-lock me-2"></i> Change Password</a>
                    <a href="{{route('logout.page')}}"><i class="fa fa-sign-out me-2"></i> Logout</a>
                </div>

            </div>

            <!-- CONTENT -->
            <div class="col-md-9 profile-content">

                <h5 class="section-title">Profile Information</h5>

                <div class="info-box">
                    <div class="info-title">Full Name</div>
                    <div class="info-value">{{ Auth::user()->name }}</div>
                </div>

                <div class="info-box">
                    <div class="info-title">Email</div>
                    <div class="info-value">{{ Auth::user()->email }}</div>
                </div>

             
               
                <div class="info-box">
                    <div class="info-title">Role</div>
                    <div class="info-value">{{ Auth::user()->role->name ?? 'User' }}</div>
                </div>

                <a href="#" class="edit-btn">
                    <i class="fa fa-edit me-1"></i> Edit Profile
                </a>

            </div>

        </div>
    </div>

</div>

@endsection