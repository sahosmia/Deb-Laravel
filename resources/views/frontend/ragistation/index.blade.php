@extends('frontend.layouts.app')
@section('title', 'Ragistation')
@section('content')
        <!-- banner section start  -->
        <section class="page_banner registation_form_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="page_banner_content">
                            <h2>Registation Page</h2>
                            <p>
                                Ex asperiores eos voluptas, corrupti eaque numquam doloremque
                                animi laborum consequatur nobis, temporibus molestias, nisi
                                error sint. Quod, incidunt? Ut, ad facilis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Section Start  -->
        <section class="registaion_form_section">
            <div class="container">
                <div class="row">
                    @include('auth.layouts.status')
                    @if ($is_ragistation == 1 && !session('success'))
                        You have alrady registered.
                    @else


                    <form class="row g-3 registaion_form" action="{{ route('front.ragistation.submit') }}"
                        method="POST">

                        @csrf
                        <!-- Name  -->
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Name <span class="mandatory">*</span></label>

                            <input type="text" class="form-control" name="name" id="inputName"
                                value="{{ auth()->user()->name }}" readonly />
                        </div>



                        <!-- Email  -->
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email <span class="mandatory">*</span></label>
                            <input type="email" class="form-control" name="email"
                                value="{{ auth()->user()->email }}" id="inputEmail" readonly />
                        </div>

                        <!-- Date of Birth  -->
                        <div class="col-md-6">
                            <label for="inputDateofBirth" class="form-label">Date of Birth <span class="mandatory">*</span></label>
                            <input name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control"
                                type="date" id="inputDateofBirth" />
                        </div>

                        <!-- Phone  -->
                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">Phone <span class="mandatory">*</span></label>
                            <input name="phone" value="{{ old('phone') }}" class="form-control"
                                type="number" id="inputPhone" />
                        </div>



                        <!-- Address  -->
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input name="address" value="{{ old('address') }}" type="text" class="form-control"
                                id="inputAddress" />
                        </div>



                        <!-- Fb Link  -->
                        <div class="col-md-6">
                            <label for="inputFbLink" class="form-label">Facebook Link <span
                                    class="mandatory">*</span></label>
                            <input name="facebook" value="{{ old('facebook') }}" type="text"
                                class="form-control" id="inputFbLink" />
                        </div>


                        <!-- Linkedin Link  -->
                        <div class="col-md-6">
                            <label for="inputLinkedinLink" class="form-label">Linkedin Link <span
                                    class="mandatory">*</span></label>
                            <input name="linkedin" value="{{ old('linkedin') }}" type="text"
                                class="form-control" id="inputLinkedinLink" />
                        </div>

                        <!-- Drive Link  -->
                        <div class="col-md-6">
                            <label for="inputDriveLink" class="form-label">Drive Link </label>
                            <input name="drive" value="{{ old('drive') }}" type="text"
                                class="form-control" id="inputDriveLink" />
                        </div>




                        <!-- Whatspp Number  -->
                        <div class="col-md-6">
                            <label for="inputWhatsapp" class="form-label">Whatsapp Number <span
                                    class="mandatory">*</span></label>
                            <input name="whatsapp" value="{{ old('whatsapp') }}" type="number" class="form-control"
                                id="inputWhatsapp" />
                        </div>

                        <!-- Batch  -->
                        <div class="col-md-6">
                            <label for="inputWhatsapp" class="form-label">Batch<span
                                    class="mandatory">*</span></label>
                            <select name="batch_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($batches as $item)
                                    <option @selected($item->id == old('batch_id')) value="{{ $item->id }}">
                                        {{ $item->title }}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="col-12">
                            <button type="submit" class="button">Registaion</button>
                        </div>
                    </form>

                    @endif
                </div>
            </div>
        </section>
        <!-- Course Category Section End  -->

@endsection

