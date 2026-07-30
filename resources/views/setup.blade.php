<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile setup| Swpapify</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
            color: white;
            background:
                radial-gradient(circle at left, rgba(46, 154, 255, 0.55), transparent 45%),
                radial-gradient(circle at right, rgba(0, 188, 212, 0.45), transparent 45%),
                linear-gradient(120deg, #071727, #102f43, #04141f);
        }

        .profile-card {
            width: 100%;
            max-width: 590px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 25px;
            background: rgba(19, 47, 65, 0.65);
            backdrop-filter: blur(18px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
        }

        .profile-card h1 {
            margin-bottom: 28px;
            text-align: center;
            font-size: 34px;
            font-weight: 700;
        }

        .input-group {
            position: relative;
            margin-bottom: 18px;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.85);
            font-size: 20px;
            pointer-events: none;
        }

        .textarea-group .input-icon {
            top: 25px;
            transform: none;
        }

        .form-control {
            width: 100%;
            min-height: 65px;
            padding: 16px 50px 16px 62px;
            border: 1px solid rgba(255, 255, 255, 0.45);
            border-radius: 13px;
            outline: none;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            font-size: 18px;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #62d8ff;
            box-shadow: 0 0 0 3px rgba(98, 216, 255, 0.15);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.88);
        }

        textarea.form-control {
            min-height: 135px;
            padding-top: 20px;
            resize: vertical;
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
        }

        select.form-control option {
            background: #143348;
            color: white;
        }

        .select-arrow {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            pointer-events: none;
            color: rgba(255, 255, 255, 0.8);
        }

        .upload-box {
            position: relative;
            min-height: 175px;
            margin-bottom: 20px;
            padding: 22px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 13px;
            background: rgba(255, 255, 255, 0.07);
            cursor: pointer;
        }

        .upload-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 18px;
            color: rgba(255, 255, 255, 0.9);
        }

        .upload-heading i {
            font-size: 22px;
        }

        #profileImage {
            display: none;
        }

        .image-preview {
            width: 88px;
            height: 88px;
            margin-top: 20px;
            margin-left: 45px;
            border: 3px solid rgba(255, 255, 255, 0.45);
            border-radius: 50%;
            object-fit: cover;
            display: none;
        }

        .default-avatar {
            width: 88px;
            height: 88px;
            margin-top: 20px;
            margin-left: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 3px solid rgba(255, 255, 255, 0.35);
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            font-size: 35px;
        }

        .continue-button {
            width: 100%;
            height: 62px;
            border: none;
            border-radius: 13px;
            background: linear-gradient(90deg, #19a9cf, #54d3e4);
            color: white;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .continue-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(36, 194, 220, 0.35);
        }

        .continue-button:disabled {
            opacity: 0.45;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        @media (max-width: 600px) {
            .profile-card {
                padding: 28px 20px;
            }

            .profile-card h1 {
                font-size: 27px;
            }

            .form-control {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

<div class="profile-card">

    <h1>Set Up Your Profile</h1>

    <form method="POST"
          action="{{ route('profile.setup.store') }}"
          enctype="multipart/form-data"
          id="profileForm">

        @csrf

        <!-- Name -->
        <div class="input-group">
            <i class="fa-regular fa-user input-icon"></i>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                placeholder="Your name"
                value="{{ old('name', auth()->user()->name ?? '') }}"
                required
            >
        </div>

        <!-- Short Bio -->
        <div class="input-group textarea-group">
            <i class="fa-regular fa-message input-icon"></i>

            <textarea
                name="bio"
                id="bio"
                class="form-control"
                placeholder="Short bio"
                required
            >{{ old('bio') }}</textarea>
        </div>

        <!-- Skill to Teach -->
        <div class="input-group">
            <i class="fa-solid fa-chart-simple input-icon"></i>

            <select
                name="skill_to_teach"
                id="skillToTeach"
                class="form-control"
                required
            >
                <option value="">Skills you want to teach*</option>
                <option value="Web Development">Web Development</option>
                <option value="Graphic Design">Graphic Design</option>
                <option value="Photography">Photography</option>
                <option value="Digital Marketing">Digital Marketing</option>
                <option value="Cooking">Cooking</option>
                <option value="English Language">English Language</option>
                <option value="Music">Music</option>
            </select>

            <i class="fa-solid fa-chevron-down select-arrow"></i>
        </div>

        <!-- Skill to Learn -->
        <div class="input-group">
            <i class="fa-solid fa-briefcase input-icon"></i>

            <select
                name="skill_to_learn"
                id="skillToLearn"
                class="form-control"
                required
            >
                <option value="">Skills you want to learn*</option>
                <option value="Web Development">Web Development</option>
                <option value="Graphic Design">Graphic Design</option>
                <option value="Photography">Photography</option>
                <option value="Digital Marketing">Digital Marketing</option>
                <option value="Cooking">Cooking</option>
                <option value="English Language">English Language</option>
                <option value="Music">Music</option>
            </select>

            <i class="fa-solid fa-chevron-down select-arrow"></i>
        </div>

        <!-- Language -->
        <div class="input-group">
            <i class="fa-solid fa-globe input-icon"></i>

            <select
                name="language"
                id="language"
                class="form-control"
                required
            >
                <option value="">Languages you speak*</option>
                <option value="Nepali">Nepali</option>
                <option value="English">English</option>
                <option value="Hindi">Hindi</option>
                <option value="Tibetan">Tibetan</option>
                <option value="Spanish">Spanish</option>
                <option value="Chinese">Chinese</option>
            </select>

            <i class="fa-solid fa-chevron-down select-arrow"></i>
        </div>

        <!-- Image Upload -->
        <label for="profileImage" class="upload-box">
            <div class="upload-heading">
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <span id="uploadText">Upload profile photo — click to change</span>
            </div>

            <input
                type="file"
                name="profile_image"
                id="profileImage"
                accept="image/png, image/jpeg, image/jpg"
            >

            <div class="default-avatar" id="defaultAvatar">
                <i class="fa-regular fa-user"></i>
            </div>

            <img
                src=""
                alt="Profile preview"
                class="image-preview"
                id="imagePreview"
            >
        </label>

        <button type="submit" class="continue-button" id="continueButton" disabled>
            Continue
        </button>

    </form>
</div>

<script>
    const form = document.getElementById('profileForm');
    const requiredFields = form.querySelectorAll('[required]');
    const continueButton = document.getElementById('continueButton');

    const profileImage = document.getElementById('profileImage');
    const imagePreview = document.getElementById('imagePreview');
    const defaultAvatar = document.getElementById('defaultAvatar');
    const uploadText = document.getElementById('uploadText');

    function checkForm() {
        let completed = true;

        requiredFields.forEach(field => {
            if (field.value.trim() === '') {
                completed = false;
            }
        });

        continueButton.disabled = !completed;
    }

    requiredFields.forEach(field => {
        field.addEventListener('input', checkForm);
        field.addEventListener('change', checkForm);
    });

    profileImage.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) {
            return;
        }

        if (!file.type.startsWith('image/')) {
            alert('Please select a valid image.');
            this.value = '';
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {
            imagePreview.src = event.target.result;
            imagePreview.style.display = 'block';
            defaultAvatar.style.display = 'none';
            uploadText.textContent = 'Profile photo selected — click to change';
        };

        reader.readAsDataURL(file);
    });

    checkForm();
</script>
</head>
<body>
    
</body>
</html>