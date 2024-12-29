

<!-- Hero Section with Typing Effect -->
<div class="container-fluid py-5">
    <div class="row align-items-center">
        <!-- Left Image Column -->
        <div class="col-lg-6 col-md-12 text-center">
            <img src="assets/rafiki.png" alt="Welcome Image" class="img-fluid">
        </div>
        
        <!-- Right Content Column -->
        <div class="col-lg-6 col-md-12 p-4">
            <div class="text-center text-lg-start">
                <h1 class="mb-4 typed-text font-medium"></h1>
                <p class="lead ">
                    Teachify is an innovative platform designed to bridge the gap
                    between students seeking knowledge and teachers eager to share
                    their expertise. Whether you're a student in search of a
                    personalized learning experience or an educator looking to empower
                    learners, Teachify makes it easy to connect and collaborate.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Tutor Search Section -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Search subjects, skills...">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select">
                                <option selected>Select Category</option>
                                <option>Mathematics</option>
                                <option>Science</option>
                                <option>Languages</option>
                                <option>Arts</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="container my-5">
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="p-4 bg-light rounded">
                <h2 class="display-4 fw-bold">100+</h2>
                <p class="lead">Subjects</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded">
                <h2 class="display-4 fw-bold">50+</h2>
                <p class="lead">Skills</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded">
                <h2 class="display-4 fw-bold">10+</h2>
                <p class="lead">Languages</p>
            </div>
        </div>
    </div>
</div>

<!-- What We Do Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="display-5 mb-4">What we do?</h2>
            <p class="lead">
                TeacherOn.com is a free website, trusted by thousands of students
                and teachers all over the world. You can find local tutors, online
                teachers, and teachers to help with tutoring, coaching,
                assignments, academic projects, and dissertations for over 9500
                subjects.
            </p>
        </div>
    </div>
</div>

<!-- Background Image Section -->
<div class="container-fluid p-0">
    <div class="position-relative">
        <div class="w-100" style="height: 300px; background-image: url('assets/bricks.jpg'); background-size: cover; background-position: center;">
            <div class="position-absolute w-100 h-100" style="background: rgba(0,0,0,0.5);"></div>
        </div>
    </div>
</div>

<!-- Add Typed.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var typed = new Typed('.typed-text', {
        strings: [
            'Welcome to Teachify – A New Way to Connect with Educators!',
            'Connecting Knowledge Seekers with Passionate Educators.',
            'Find the Right Teacher for Your Learning Journey',
            'Transforming Education with a Click.'
        ],
        typeSpeed: 60,
        backSpeed: 30,
        loop: true
    });
});
</script>

<!-- Add custom CSS -->
<style>
    .typed-text {
        min-height: 80px;
    }
    
    .bg-light {
        background-color: #f8f9fa;
        transition: transform 0.3s ease;
    }
    
    .bg-light:hover {
        transform: translateY(-5px);
    }
    
    /* Add more custom styles as needed */
</style>

