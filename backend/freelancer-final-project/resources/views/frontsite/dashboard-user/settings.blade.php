@extends('frontsite.dashboard-user.master')
@section('content')

<!-- Dashboard Headline -->
<div class="dashboard-headline">
	<h3>Settings</h3>

	<!-- Breadcrumbs -->
	<nav id="breadcrumbs" class="dark">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Dashboard</a></li>
			<li>Settings</li>
		</ul>
	</nav>
</div>

<!-- Row -->
<div class="row">
	<form action="{{route('user.settings.save')}}" id="formSettings" method="post" enctype="multipart/form-data">
		@csrf
		@method('put')
		<!-- Dashboard Box -->
		<div class="col-xl-12">
			<div class="dashboard-box margin-top-0">

				<!-- Headline -->
				<div class="headline">
					<h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
				</div>

				<div class="content with-padding padding-bottom-0">

					<div class="row">

						<div class="col-auto">
							<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
								<img class="profile-pic" src="{{ Auth::user()->image_url }}" alt="" />
								<div class="upload-button"></div>
								<input class="file-upload" name="profile_photo" type="file" accept="image/*" />
							</div>
						</div>

						<div class="col">
							<div class="row">

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>First Name</h5>
										<input type="text" name="first_name" class="with-border" value="{{ $profile->first_name }}">
									</div>
								</div>

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>Last Name</h5>
										<input type="text" name="last_name" class="with-border" value="{{ $profile->last_name }}">
									</div>
								</div>

								<div class="col-xl-6">
									<!-- Account Type -->
									<div class="submit-field">
										<h5>Account Type</h5>
										<div class="account-type">
											<div>
												<input type="radio" name="type" id="freelancer-radio" value="freelancer" class="account-type-radio" @checked($user->type == 'freelancer')/>
												<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
											</div>

											<div>
												<input type="radio" name="type" id="employer-radio" value="client" class="account-type-radio" @checked($user->type == 'client')/>
												<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>Email</h5>
										<input type="text" name="email" class="with-border" value="{{ $user->email}}">
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Dashboard Box -->
		<div class="col-xl-12">
			<div class="dashboard-box">

				<!-- Headline -->
				<div class="headline">
					<h3><i class="icon-material-outline-face"></i> My Profile</h3>
				</div>

				<div class="content">
					<ul class="fields-ul">
						<li>
							<div class="row">
								<div class="col-xl-4">
									<div class="submit-field">
										<div class="bidding-widget">
											<!-- Headline -->
											<span class="bidding-detail">Set your <strong>minimal hourly rate</strong></span>

											<!-- Slider -->
											<div class="bidding-value margin-bottom-10">$<span id="biddingVal"></span></div>
											<input class="bidding-slider" name="hourly_rate" type="text" value="{{ $profile->hourly_rate }}" data-slider-handle="custom" data-slider-currency="$" data-slider-min="5" data-slider-max="150" data-slider-value="{{ $profile->hourly_rate }}" data-slider-step="1" data-slider-tooltip="hide" />
										</div>
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Skills <i class="help-icon" data-tippy-placement="right" title="Add up to 10 skills"></i></h5>

										<!-- Skills List -->
										<div class="keywords-container">
											<div class="keyword-input-container">
												<input type="text" class="keyword-input with-border" placeholder="e.g. Angular, Laravel" />
												<button type="button" class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
											</div>
											<div class="keywords-list">
												@forelse($profile->skills_arr as $skill)

												<span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">{{$skill}}</span></span>
												@empty
												<p></p>
												@endforelse
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Attachments</h5>

										<!-- Attachments -->
										<div class="attachments-container margin-top-0 margin-bottom-0">
											<div class="attachment-box ripple-effect">
												<span>Cover Letter</span>
												<i>PDF</i>
												<button type="button" class="remove-attachment" data-tippy-placement="top" title="Remove"></button>
											</div>
											<div class="attachment-box ripple-effect">
												<span>Contract</span>
												<i>DOCX</i>
												<button class="remove-attachment" data-tippy-placement="top" title="Remove"></button>
											</div>
										</div>
										<div class="clearfix"></div>

										<!-- Upload Button -->
										<div class="uploadButton margin-top-0">
											<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple />
											<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
											<span class="uploadButton-file-name">Maximum file size: 10 MB</span>
										</div>

									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-xl-6">
									<div class="submit-field">
										<h5>Tagline</h5>
										<input type="text" name="title" class="with-border" value="{{$profile->title}}">
									</div>
								</div>

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>Nationality</h5>
										<x-country-select :selected="$profile->country"></x-country-select>

									</div>
								</div>

								<div class="col-xl-12">
									<div class="submit-field">
										<h5>Introduce Yourself</h5>
										<textarea cols="30" name="description" rows="5" class="with-border">
										{{$profile->description}}</textarea>
									</div>
								</div>

							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Dashboard Box -->
		<!-- <div class="col-xl-12">
			<div id="test1" class="dashboard-box"> -->

		<!-- Headline -->
		<!-- <div class="headline">
					<h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
				</div>

				<div class="content with-padding">
					<div class="row">
						<div class="col-xl-4">
							<div class="submit-field">
								<h5>Current Password</h5>
								<input type="password" class="with-border">
							</div>
						</div>

						<div class="col-xl-4">
							<div class="submit-field">
								<h5>New Password</h5>
								<input type="password" class="with-border">
							</div>
						</div>

						<div class="col-xl-4">
							<div class="submit-field">
								<h5>Repeat New Password</h5>
								<input type="password" class="with-border">
							</div>
						</div>

						<div class="col-xl-12">
							<div class="checkbox">
								<input type="checkbox" id="two-step" checked>
								<label for="two-step"><span class="checkbox-icon"></span> Enable Two-Step Verification via Email</label>
							</div>
						</div>
					</div>
				</div> -->
<!-- </div> -->

<!-- Button -->
<div class="col-xl-12">
	<button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
</div>
</form>
</div>
<!-- Row / End -->


<!-- Dashboard Content / End -->
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script> -->
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#formSettings').submit(function(e) {
		let keywords = document.querySelectorAll(".keywords-list span .keyword-text");
		let skills = [];
		keywords.forEach((e) => {
			skills.push(e.innerHTML);
			console.log(e.innerHTML);
		})

		e.preventDefault();

		var form = $(this);
		// form.append('dd',5);
		let data = new FormData(this);
		data.append('_method', 'put');
		data.append('skills', skills.join(', '));
		let url = form.attr('action');

		$.ajax({
			type: "post",
			url,
			data,
			cache: false,
			contentType: false,
			processData: false,
			success: function(res) {
				console.log(res.message)
				toastr.success(res.message);
			},
			error: function(data) {
				let errors = data.responseJSON;
				// toastr.error(errors.message);
				console.log(errors)
			},
		});

	});

	function addSkills() {
		let keywords = document.querySelectorAll(".keywords-list span .keyword-text");

		skills = "";
		keywords.forEach((e) => {
			skills += e.innerHTML + ", ";
			console.log(e.innerHTML);
		})
	}

	// console.log($('.keywords-list span:nth-child(3)').val);
</script>
@endsection
