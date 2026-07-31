<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Complete Profile | Swapify</title>

    <style>
        :root {
            --sage: #C9DDC3;
            --woodland: #455947;
            --vanilla: #D4BDA1;
            --russet: #864622;
            --deer: #C78B53;
            --coffee: #3B3330;
            --cream: #F8F2E9;
            --white: #FFFFFF;
            --border: rgba(69, 89, 71, 0.22);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(
                135deg,
                var(--sage),
                var(--cream),
                var(--vanilla)
            );
            color: var(--coffee);
        }

        .navbar {
            min-height: 75px;
            background: var(--woodland);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 7%;
            box-shadow: 0 4px 15px rgba(59, 51, 48, 0.18);
        }

        .logo {
            color: var(--cream);
            font-size: 29px;
            font-weight: 800;
            text-decoration: none;
        }

        .back-link {
            color: var(--cream);
            text-decoration: none;
            padding: 10px 18px;
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 25px;
            transition: 0.25s ease;
        }

        .back-link:hover {
            background: var(--russet);
            border-color: var(--russet);
        }

        .page-container {
            width: min(1100px, 92%);
            margin: 45px auto;
        }

        .page-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .page-heading h1 {
            color: var(--woodland);
            font-size: 42px;
            margin-bottom: 10px;
        }

        .page-heading p {
            font-size: 17px;
            line-height: 1.6;
        }

        .profile-form {
            background: rgba(248, 242, 233, 0.96);
            border-radius: 25px;
            padding: 38px;
            box-shadow: 0 15px 40px rgba(59, 51, 48, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .form-section {
            margin-bottom: 38px;
        }

        .section-heading {
            color: var(--woodland);
            font-size: 24px;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--deer);
        }

        .profile-picture-wrapper {
            display: flex;
            align-items: center;
            gap: 25px;
            padding: 22px;
            background: var(--sage);
            border-radius: 20px;
            margin-bottom: 25px;
        }

        .profile-preview {
            width: 135px;
            height: 135px;
            min-width: 135px;
            border-radius: 50%;
            background: var(--cream);
            border: 5px solid var(--woodland);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: var(--woodland);
            font-size: 46px;
            font-weight: bold;
        }

        .profile-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-details h3 {
            color: var(--woodland);
            margin-bottom: 8px;
        }

        .upload-details p {
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .upload-button {
            display: inline-block;
            background: var(--russet);
            color: var(--white);
            padding: 12px 22px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 700;
            transition: 0.25s ease;
        }

        .upload-button:hover {
            background: var(--deer);
        }

        #profile_picture {
            display: none;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .required {
            color: var(--russet);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            border: 1px solid var(--border);
            background: var(--white);
            color: var(--coffee);
            padding: 14px 15px;
            border-radius: 12px;
            font-size: 15px;
            outline: none;
            transition: 0.25s ease;
        }

        .form-group textarea {
            min-height: 105px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--woodland);
            box-shadow: 0 0 0 3px rgba(69, 89, 71, 0.13);
        }

        .skills-information {
            color: #665D57;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .skill-category {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 17px;
            padding: 20px;
            margin-bottom: 17px;
        }

        .skill-category h3 {
            color: var(--woodland);
            font-size: 18px;
            margin-bottom: 15px;
        }

        .skill-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-option {
            cursor: pointer;
        }

        .skill-option input {
            display: none;
        }

        .skill-option span {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 25px;
            border: 1px solid rgba(69, 89, 71, 0.25);
            background: var(--cream);
            color: var(--coffee);
            font-size: 14px;
            transition: 0.22s ease;
        }

        .skill-option span:hover {
            border-color: var(--russet);
            background: var(--vanilla);
        }

        .skill-option input:checked + span {
            background: var(--woodland);
            color: var(--white);
            border-color: var(--woodland);
        }

        .custom-skill-box {
            margin-top: 22px;
            padding: 20px;
            background: var(--vanilla);
            border-radius: 17px;
            border: 1px solid var(--border);
        }

        .custom-skill-box h3 {
            color: var(--woodland);
            margin-bottom: 8px;
        }

        .custom-skill-box p {
            font-size: 14px;
            margin-bottom: 14px;
        }

        .custom-skill-input {
            display: flex;
            gap: 10px;
        }

        .custom-skill-input input {
            flex: 1;
            padding: 13px 15px;
            border: 1px solid var(--border);
            border-radius: 12px;
            outline: none;
            font-size: 15px;
        }

        .add-skill-button {
            border: none;
            background: var(--woodland);
            color: white;
            padding: 12px 22px;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
        }

        .add-skill-button:hover {
            background: var(--russet);
        }

        .custom-skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

        .custom-skill-item {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 13px;
            background: var(--woodland);
            color: white;
            border-radius: 25px;
            font-size: 14px;
        }

        .custom-skill-item button {
            width: 22px;
            height: 22px;
            border: none;
            border-radius: 50%;
            background: var(--russet);
            color: white;
            cursor: pointer;
            font-size: 17px;
        }

        .form-actions {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .save-button {
            border: none;
            background: var(--russet);
            color: var(--white);
            padding: 15px 45px;
            border-radius: 30px;
            font-size: 17px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .save-button:hover {
            background: var(--deer);
            transform: translateY(-2px);
        }

        .save-button:disabled {
            opacity: 0.65;
            cursor: not-allowed;
        }

        .error-message {
            margin-bottom: 22px;
            padding: 15px 18px;
            background: #F2D7C8;
            border-left: 5px solid var(--russet);
            border-radius: 10px;
            color: var(--russet);
            font-weight: 700;
        }

        #javascriptError {
            display: none;
            margin-top: 22px;
            margin-bottom: 0;
            text-align: center;
        }

        @media (max-width: 760px) {
            .navbar {
                padding: 15px 5%;
            }

            .logo {
                font-size: 24px;
            }

            .page-container {
                width: 94%;
                margin: 28px auto;
            }

            .page-heading h1 {
                font-size: 32px;
            }

            .profile-form {
                padding: 23px 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .profile-picture-wrapper {
                flex-direction: column;
                text-align: center;
            }

            .custom-skill-input {
                flex-direction: column;
            }

            .add-skill-button,
            .save-button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();

    $skillGroups = [
        'Creative & Arts' => [
            'Graphic Design',
            'UI/UX Design',
            'Illustration',
            'Animation',
            'Photography',
            'Video Editing',
            'Music Production',
            'Drawing & Sketching',
            'Creative Writing'
        ],

        'Tech & Development' => [
            'Web Development',
            'Frontend Development',
            'Backend Development',
            'App Development',
            'PHP',
            'Laravel',
            'JavaScript',
            'Python',
            'Data Science',
            'AI / Machine Learning',
            'Cybersecurity'
        ],

        'Language & Communication' => [
            'English',
            'Nepali',
            'Spanish',
            'French',
            'German',
            'Italian',
            'Arabic',
            'Japanese',
            'Chinese',
            'Public Speaking',
            'Copywriting',
            'Translation'
        ],

        'Business & Marketing' => [
            'Digital Marketing',
            'Social Media Marketing',
            'Content Marketing',
            'SEO',
            'Branding',
            'Sales',
            'Entrepreneurship',
            'Finance Basics'
        ],

        'Career & Soft Skills' => [
            'Resume Writing',
            'Interview Preparation',
            'Leadership',
            'Teamwork',
            'Time Management',
            'Problem Solving',
            'Presentation Skills'
        ],

        'Health, Fitness & Lifestyle' => [
            'Fitness Coaching',
            'Yoga',
            'Meditation',
            'Nutrition',
            'Breathwork',
            'Habit Building',
            'Personal Development',
            'Productivity Coaching'
        ],

        'Lifestyle, Games & Hobbies' => [
            'Cooking',
            'Baking',
            'Chess',
            'Gaming',
            'Gardening',
            'Fashion',
            'Makeup',
            'Travel Planning'
        ]
    ];

    $selectedTeachSkills = old(
        'teach_skills',
        $user->teach_skills ?? []
    );

    $selectedLearnSkills = old(
        'learn_skills',
        $user->learn_skills ?? []
    );

    if (is_string($selectedTeachSkills)) {
        $selectedTeachSkills =
            json_decode($selectedTeachSkills, true) ?: [];
    }

    if (is_string($selectedLearnSkills)) {
        $selectedLearnSkills =
            json_decode($selectedLearnSkills, true) ?: [];
    }

    $selectedTeachSkills = is_array($selectedTeachSkills)
        ? $selectedTeachSkills
        : [];

    $selectedLearnSkills = is_array($selectedLearnSkills)
        ? $selectedLearnSkills
        : [];

    $presetSkills = collect($skillGroups)
        ->flatten()
        ->values()
        ->all();

    $customTeachSkills = array_values(
        array_filter(
            $selectedTeachSkills,
            fn ($skill) => !in_array($skill, $presetSkills, true)
        )
    );

    $customLearnSkills = array_values(
        array_filter(
            $selectedLearnSkills,
            fn ($skill) => !in_array($skill, $presetSkills, true)
        )
    );
@endphp

<nav class="navbar">

    <a href="{{ route('home') }}" class="logo">
        Swapify
    </a>

    <a href="{{ route('dashboard') }}" class="back-link">
        ← Dashboard
    </a>

</nav>

<main class="page-container">

    <div class="page-heading">

        <h1>Complete Your Profile</h1>

        <p>
            Add your information and select the skills you want
            to teach and learn.
        </p>

    </div>

    @if ($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
    @endif

    <form
        class="profile-form"
        id="profileForm"
        action="{{ route('profile.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <section class="form-section">

            <h2 class="section-heading">
                Personal Information
            </h2>

            <div class="profile-picture-wrapper">

                <div class="profile-preview">

                    <span
                        id="profileIcon"
                        @if ($user->profile_picture)
                            style="display: none;"
                        @endif
                    >
                        👤
                    </span>

                    <img
                        id="previewImage"
                        alt="Profile preview"

                        @if ($user->profile_picture)
                            src="{{ asset('storage/' . $user->profile_picture) }}"
                            style="display: block;"
                        @else
                            src=""
                            style="display: none;"
                        @endif
                    >

                </div>

                <div class="upload-details">

                    <h3>Profile Picture</h3>

                    <p>
                        Upload a JPG, JPEG or PNG picture smaller
                        than 3 MB.
                    </p>

                    <label
                        for="profile_picture"
                        class="upload-button"
                    >
                        Choose Picture
                    </label>

                    <input
                        type="file"
                        id="profile_picture"
                        name="profile_picture"
                        accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                    >

                </div>

            </div>

            <div class="form-grid">

                <div class="form-group">

                    <label for="name">
                        Full Name
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        placeholder="Enter your full name"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="contact">
                        Contact Number
                        <span class="required">*</span>
                    </label>

                    <input
                        type="tel"
                        id="contact"
                        name="contact"
                        value="{{ old('contact', $user->contact) }}"
                        placeholder="+977 98XXXXXXXX"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        placeholder="example@email.com"
                    >

                </div>

                <div class="form-group">

                    <label for="gender">
                        Gender
                    </label>

                    <select id="gender" name="gender">

                        <option value="">
                            Select gender
                        </option>

                        @foreach ([
                            'Male',
                            'Female',
                            'Other',
                            'Prefer not to say'
                        ] as $gender)

                            <option
                                value="{{ $gender }}"
                                @selected(
                                    old('gender', $user->gender) === $gender
                                )
                            >
                                {{ $gender }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group full-width">

                    <label for="bio">
                        About Yourself
                    </label>

                    <textarea
                        id="bio"
                        name="bio"
                        placeholder="Write a short description about yourself..."
                    >{{ old('bio', $user->bio) }}</textarea>

                </div>

            </div>

        </section>

        <section class="form-section">

            <h2 class="section-heading">
                Address Information
            </h2>

            <div class="form-grid">

                <div class="form-group">

                    <label for="province">
                        Province
                        <span class="required">*</span>
                    </label>

                    <select
                        id="province"
                        name="province"
                        required
                    >

                        <option value="">
                            Select your province
                        </option>

                        @foreach ([
                            'Koshi Province',
                            'Madhesh Province',
                            'Bagmati Province',
                            'Gandaki Province',
                            'Lumbini Province',
                            'Karnali Province',
                            'Sudurpashchim Province'
                        ] as $province)

                            <option
                                value="{{ $province }}"
                                @selected(
                                    old('province', $user->province)
                                    === $province
                                )
                            >
                                {{ $province }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group">

                    <label for="district">
                        District
                        <span class="required">*</span>
                    </label>

                    <select
                        id="district"
                        name="district"
                        required
                        disabled
                    >
                        <option value="">
                            Select province first
                        </option>
                    </select>

                </div>

                <div class="form-group">

                    <label for="municipality">
                        Municipality / City
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="municipality"
                        name="municipality"
                        value="{{ old('municipality', $user->municipality) }}"
                        placeholder="Example: Kathmandu Metropolitan City"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="ward">
                        Ward Number
                    </label>

                    <input
                        type="number"
                        id="ward"
                        name="ward"
                        value="{{ old('ward', $user->ward) }}"
                        min="1"
                        max="50"
                        placeholder="Example: 5"
                    >

                </div>

            </div>

        </section>

        <section class="form-section">

            <h2 class="section-heading">
                Skills You Want to Teach
            </h2>

            <p class="skills-information">
                Select one or more skills that you can teach
                other Swapify members.
            </p>

            @foreach ($skillGroups as $category => $skills)

                <div class="skill-category">

                    <h3>{{ $category }}</h3>

                    <div class="skill-options">

                        @foreach ($skills as $skill)

                            <label class="skill-option">

                                <input
                                    type="checkbox"
                                    name="teach_skills[]"
                                    value="{{ $skill }}"
                                    @checked(
                                        in_array(
                                            $skill,
                                            $selectedTeachSkills,
                                            true
                                        )
                                    )
                                >

                                <span>{{ $skill }}</span>

                            </label>

                        @endforeach

                    </div>

                </div>

            @endforeach

            <div class="custom-skill-box">

                <h3>Add Your Own Teaching Skill</h3>

                <p>
                    If your skill is not listed, enter it here.
                </p>

                <div class="custom-skill-input">

                    <input
                        type="text"
                        id="custom_teach_skill"
                        placeholder="Example: Nepali Cooking"
                    >

                    <button
                        type="button"
                        class="add-skill-button"
                        onclick="addCustomSkill('teach')"
                    >
                        + Add Skill
                    </button>

                </div>

                <div
                    class="custom-skills-list"
                    id="custom_teach_skills"
                >

                    @foreach ($customTeachSkills as $skill)

                        <div class="custom-skill-item">

                            <input
                                type="hidden"
                                name="teach_skills[]"
                                value="{{ $skill }}"
                            >

                            <span>{{ $skill }}</span>

                            <button
                                type="button"
                                class="remove-skill-button"
                                title="Remove skill"
                            >
                                ×
                            </button>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

        <section class="form-section">

            <h2 class="section-heading">
                Skills You Want to Learn
            </h2>

            <p class="skills-information">
                Select one or more skills that you are interested
                in learning.
            </p>

            @foreach ($skillGroups as $category => $skills)

                <div class="skill-category">

                    <h3>{{ $category }}</h3>

                    <div class="skill-options">

                        @foreach ($skills as $skill)

                            <label class="skill-option">

                                <input
                                    type="checkbox"
                                    name="learn_skills[]"
                                    value="{{ $skill }}"
                                    @checked(
                                        in_array(
                                            $skill,
                                            $selectedLearnSkills,
                                            true
                                        )
                                    )
                                >

                                <span>{{ $skill }}</span>

                            </label>

                        @endforeach

                    </div>

                </div>

            @endforeach

            <div class="custom-skill-box">

                <h3>Add Your Own Learning Skill</h3>

                <p>
                    If the skill is not listed, enter it here.
                </p>

                <div class="custom-skill-input">

                    <input
                        type="text"
                        id="custom_learn_skill"
                        placeholder="Example: Motorcycle Repair"
                    >

                    <button
                        type="button"
                        class="add-skill-button"
                        onclick="addCustomSkill('learn')"
                    >
                        + Add Skill
                    </button>

                </div>

                <div
                    class="custom-skills-list"
                    id="custom_learn_skills"
                >

                    @foreach ($customLearnSkills as $skill)

                        <div class="custom-skill-item">

                            <input
                                type="hidden"
                                name="learn_skills[]"
                                value="{{ $skill }}"
                            >

                            <span>{{ $skill }}</span>

                            <button
                                type="button"
                                class="remove-skill-button"
                                title="Remove skill"
                            >
                                ×
                            </button>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

        <div class="form-actions">

            <button
                type="submit"
                class="save-button"
                id="saveButton"
            >
                Save & Continue
            </button>

        </div>

        <div
            class="error-message"
            id="javascriptError"
        ></div>

    </form>

</main>

<script>
    const districtsByProvince = {
        "Koshi Province": [
            "Bhojpur",
            "Dhankuta",
            "Ilam",
            "Jhapa",
            "Khotang",
            "Morang",
            "Okhaldhunga",
            "Panchthar",
            "Sankhuwasabha",
            "Solukhumbu",
            "Sunsari",
            "Taplejung",
            "Terhathum",
            "Udayapur"
        ],

        "Madhesh Province": [
            "Bara",
            "Dhanusha",
            "Mahottari",
            "Parsa",
            "Rautahat",
            "Saptari",
            "Sarlahi",
            "Siraha"
        ],

        "Bagmati Province": [
            "Bhaktapur",
            "Chitwan",
            "Dhading",
            "Dolakha",
            "Kathmandu",
            "Kavrepalanchok",
            "Lalitpur",
            "Makwanpur",
            "Nuwakot",
            "Ramechhap",
            "Rasuwa",
            "Sindhuli",
            "Sindhupalchok"
        ],

        "Gandaki Province": [
            "Baglung",
            "Gorkha",
            "Kaski",
            "Lamjung",
            "Manang",
            "Mustang",
            "Myagdi",
            "Nawalpur",
            "Parbat",
            "Syangja",
            "Tanahun"
        ],

        "Lumbini Province": [
            "Arghakhanchi",
            "Banke",
            "Bardiya",
            "Dang",
            "Gulmi",
            "Kapilvastu",
            "Parasi",
            "Palpa",
            "Pyuthan",
            "Rolpa",
            "Rukum East",
            "Rupandehi"
        ],

        "Karnali Province": [
            "Dailekh",
            "Dolpa",
            "Humla",
            "Jajarkot",
            "Jumla",
            "Kalikot",
            "Mugu",
            "Rukum West",
            "Salyan",
            "Surkhet"
        ],

        "Sudurpashchim Province": [
            "Achham",
            "Baitadi",
            "Bajhang",
            "Bajura",
            "Dadeldhura",
            "Darchula",
            "Doti",
            "Kailali",
            "Kanchanpur"
        ]
    };

    const provinceSelect =
        document.getElementById('province');

    const districtSelect =
        document.getElementById('district');

    const initialDistrict =
        @json(old('district', $user->district));

    function updateDistrictOptions(
        selectedDistrict = ''
    ) {
        const selectedProvince =
            provinceSelect.value;

        districtSelect.innerHTML = '';

        if (
            selectedProvince === '' ||
            !districtsByProvince[selectedProvince]
        ) {
            const option =
                document.createElement('option');

            option.value = '';
            option.textContent =
                'Select province first';

            districtSelect.appendChild(option);
            districtSelect.disabled = true;

            return;
        }

        const firstOption =
            document.createElement('option');

        firstOption.value = '';
        firstOption.textContent =
            'Select your district';

        districtSelect.appendChild(firstOption);

        districtsByProvince[selectedProvince]
            .forEach(function (district) {
                const option =
                    document.createElement('option');

                option.value = district;
                option.textContent = district;

                if (district === selectedDistrict) {
                    option.selected = true;
                }

                districtSelect.appendChild(option);
            });

        districtSelect.disabled = false;
    }

    provinceSelect.addEventListener(
        'change',
        function () {
            updateDistrictOptions('');
        }
    );

    updateDistrictOptions(initialDistrict);

    const profilePictureInput =
        document.getElementById('profile_picture');

    const previewImage =
        document.getElementById('previewImage');

    const profileIcon =
        document.getElementById('profileIcon');

    profilePictureInput.addEventListener(
        'change',
        function () {
            const selectedFile = this.files[0];

            if (!selectedFile) {
                return;
            }

            const allowedTypes = [
                'image/jpeg',
                'image/png'
            ];

            if (!allowedTypes.includes(selectedFile.type)) {
                alert(
                    'Please select a JPG, JPEG or PNG image.'
                );

                this.value = '';
                return;
            }

            if (selectedFile.size > 3 * 1024 * 1024) {
                alert(
                    'Profile picture must be smaller than 3 MB.'
                );

                this.value = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                previewImage.src = event.target.result;
                previewImage.style.display = 'block';
                profileIcon.style.display = 'none';
            };

            reader.readAsDataURL(selectedFile);
        }
    );

    function addCustomSkill(type) {
        const input = document.getElementById(
            `custom_${type}_skill`
        );

        const container = document.getElementById(
            `custom_${type}_skills`
        );

        const skillValue = input.value.trim();

        const inputName =
            type === 'teach'
                ? 'teach_skills[]'
                : 'learn_skills[]';

        if (skillValue === '') {
            alert('Please enter a skill name.');
            return;
        }

        const allSkillInputs = Array.from(
            document.querySelectorAll(
                `input[name="${inputName}"]`
            )
        );

        const existingSkill = allSkillInputs.find(
            function (skillInput) {
                return skillInput.value
                    .toLowerCase() ===
                    skillValue.toLowerCase();
            }
        );

        if (existingSkill) {
            if (
                existingSkill.type === 'checkbox' &&
                !existingSkill.checked
            ) {
                existingSkill.checked = true;
                input.value = '';
                return;
            }

            alert(
                'This skill has already been selected or added.'
            );

            return;
        }

        const skillItem =
            document.createElement('div');

        skillItem.className =
            'custom-skill-item';

        const hiddenInput =
            document.createElement('input');

        hiddenInput.type = 'hidden';
        hiddenInput.name = inputName;
        hiddenInput.value = skillValue;

        const skillText =
            document.createElement('span');

        skillText.textContent = skillValue;

        const removeButton =
            document.createElement('button');

        removeButton.type = 'button';
        removeButton.innerHTML = '×';
        removeButton.title = 'Remove skill';

        removeButton.addEventListener(
            'click',
            function () {
                skillItem.remove();
            }
        );

        skillItem.appendChild(hiddenInput);
        skillItem.appendChild(skillText);
        skillItem.appendChild(removeButton);

        container.appendChild(skillItem);

        input.value = '';
        input.focus();
    }

    document
        .querySelectorAll('.remove-skill-button')
        .forEach(function (button) {
            button.addEventListener(
                'click',
                function () {
                    button.closest(
                        '.custom-skill-item'
                    ).remove();
                }
            );
        });

    document
        .getElementById('custom_teach_skill')
        .addEventListener(
            'keydown',
            function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    addCustomSkill('teach');
                }
            }
        );

    document
        .getElementById('custom_learn_skill')
        .addEventListener(
            'keydown',
            function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    addCustomSkill('learn');
                }
            }
        );

    const profileForm =
        document.getElementById('profileForm');

    const javascriptError =
        document.getElementById('javascriptError');

    const saveButton =
        document.getElementById('saveButton');

    profileForm.addEventListener(
        'submit',
        function (event) {
            javascriptError.style.display = 'none';

            const teachingSkills =
                document.querySelectorAll(
                    'input[name="teach_skills[]"]:checked, ' +
                    'input[type="hidden"][name="teach_skills[]"]'
                );

            const learningSkills =
                document.querySelectorAll(
                    'input[name="learn_skills[]"]:checked, ' +
                    'input[type="hidden"][name="learn_skills[]"]'
                );

            if (teachingSkills.length === 0) {
                event.preventDefault();

                showError(
                    'Please select at least one skill you want to teach.'
                );

                return;
            }

            if (learningSkills.length === 0) {
                event.preventDefault();

                showError(
                    'Please select at least one skill you want to learn.'
                );

                return;
            }

            saveButton.disabled = true;
            saveButton.textContent = 'Saving...';
        }
    );

    function showError(message) {
        javascriptError.textContent = message;
        javascriptError.style.display = 'block';

        javascriptError.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }
</script>

</body>
</html>