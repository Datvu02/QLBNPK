@extends('layouts.app', ['activePage' => 'register', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION'])

@section('content')
    <div class="full-page register-page section-image" data-color="orange" data-image="{{ asset('light-bootstrap/img/bg5.jpg') }}">
        <div class="content">
            <div class="container">
                <div class="card card-register card-plain text-center">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-circle-09"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Free Account') }}</h4>
                                        <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-preferences-circle-rotate"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Awesome Performances') }}</h4>
                                        <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-planet"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Global Support') }}</h4>
                                        <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mr-auto">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="card card-plain">
                                        <div class="content">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Tên') }}" value="{{ old('name') }}" required autofocus>
                                            </div>

                                            <div class="form-group">
                                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" placeholder="Xác nhận mât khẩu" class="form-control" required autofocus>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" name="address" placeholder="Địa chỉ" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <select name="gender" class="form-control" required>
                                                    <option value="male">Giới tính</option>
                                                    <option value="male">Nam</option>
                                                    <option value="female">Nữ</option>
                                                    <option value="other">Khã</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="date" name="birth_date" class="form-control" placeholder="Ngày sinh" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" name="id_card" placeholder="Căn cước" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <select name="role" class="form-control" required>
                                                    <option value="doctor">Chức năng</option>
                                                    <option value="doctor">Bác sĩ</option>
                                                    <option value="staff">Nhân viên</option>
                                                    <option value="patient">Bệnh nhân</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" name="occupation" placeholder="Nghề nghiệp" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group" id="certificate-field">
                                                <input type="text" name="certificate" placeholder="Chứng chỉ bác sĩ" class="form-control">
                                            </div>
                                                            
                                            <div class="form-group" id="specialization-field">
                                                <input type="text" name="specialization" placeholder="Chuyên ngành bác sĩ" class="form-control">
                                            </div>

                                            
                                            <div class="form-group">
                                                <input type="text" name="phone_number" placeholder="Số điện thoại" class="form-control" required>
                                            </div>

                                            <div class="form-group d-flex justify-content-center">
                                                <div class="form-check rounded col-md-10 text-left">
                                                    <label class="form-check-label text-white d-flex align-items-center">
                                                        <input class="form-check-input" name="agree" type="checkbox" required >
                                                        <span class="form-check-sign"></span>
                                                        <b>{{ __('Đồng ý với các điều khoản và điều kiện') }}</b>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="footer text-center">
                                                <button type="submit" class="btn btn-fill btn-neutral btn-wd">{{ __('Đăng ký') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning alert-dismissible fade show" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ẩn các trường certificate và specialization ban đầu
            $('#certificate-field').hide();
            $('#specialization-field').hide();

            // Xử lý khi trường role thay đổi giá trị
            $('#role').change(function() {
                if ($(this).val() === 'doctor') {
                    $('#certificate-field').show();
                    $('#specialization-field').show();
                } else {
                    $('#certificate-field').hide();
                    $('#specialization-field').hide();
                }
            });
        });
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush