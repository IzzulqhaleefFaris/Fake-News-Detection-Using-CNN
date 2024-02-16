<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Title --}}
    <title>IntelliGuard</title>

    {{-- Link Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Link App CSS --}}
    <link rel="stylesheet" href="/app.css">
</head>

<body class="body" data-bs-spy="scroll" data-bs-target="#navbarText" data-bs-offset="56">
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
            class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z" />
        </svg>
    </button>
    {{-- Content --}}

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="background-color: #FFFFFF;" id="navbarText">
        <div class="container py-2">
            <a class="navbar-brand fw-bold fs-3" href="/">IntelliGuard&emsp;&emsp;</a>
            <div class="text-end">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home&emsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About&emsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#whyUs">Why Us&emsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact&emsp;</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="#detect" class="btn btn-lg fw-bold" id="btn-main">Detect</a>
                </span>
            </div>
        </div>
    </nav>
    <br><br>

    {{-- Main --}}
    <div id="text-align">

        <div class="container">

            {{-- Intro --}}
            <div class="card p-4 rounded-5 shadow">
                <div class="card-body">
                    <div>
                        <div class="row align-items-center g-4">
                            <div class="col-md-6">
                                <p class="fw-semibold heading">Fake News Detection System</p>
                                <h1 class="fw-bold mb-4 header">Welcome to <span class="heading">IntelliGuard</span>
                                </h1>
                                <div id="text-justify">
                                    <p class="mb-4">
                                        IntelliGuard is your trusted tool to quickly and reliably identify bias and
                                        misinformation in news articles. Our system has been meticulously trained using
                                        a 
                                        dataset labeled by expert evaluators. We've leveraged this dataset to build a
                                        robust
                                        text classification system that effectively distinguishes between real and fake
                                        news.
                                    </p>
                                </div>
                                <br>
                                <a href="#detect"
                                    class="text-decoration-none btn btn-lg fw-bold rounded-pill py-2 px-4 shadow"
                                    id="btn-main">Get
                                    Started</a>
                            </div>
                            <div class="col-md-6 text-end">
                                <img src="images/news-intro.png" class="img-fluid img p-4 rounded-pill" width="400">
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <br><br>

            {{-- Detect --}}
            <div class="card p-2 rounded-5 shadow">
                <div class="cardF">
                    <br>
                    <div class="card-headerF">
                        <h3 class="text-center fw-bold" id="detect">Fake News Detector</h3>
                    </div>
                    <br>
                    <div class="card-body">
                        <form id="predictionForm">
                            @csrf
                            <div class="row align-items-start g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row align-items-center g-4 mb-2">
                                            <div class="col-6">
                                                <label for="headline" class="fw-semibold">Headline Title:</label>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#HeadlineModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="#7752FE" class="bi bi-info-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="headline" name="headline"
                                            placeholder="Enter the headline title" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="row align-items-center mb-2">
                                            <div class="col-6">
                                                <label for="article-content" class="fw-semibold">Article
                                                    Content:</label>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#ArticleModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="#7752FE" class="bi bi-info-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <textarea class="form-control" name="article" id="article" rows="5"
                                            placeholder="Paste the article content here" required></textarea>
                                    </div>
                                    <br>
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <div class="d-grid">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="clearForm()">Clear All</button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-grid">
                                                <button type="button" class="btn" id="btn-main"
                                                    onclick="predict()">Detect</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center g-4 mb-2">
                                        <div class="col-6">
                                            <label for="result" class="fs-4 fw-bold">Result:</label>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#ResultModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="#7752FE" class="bi bi-info-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="card rounded-5 overflow-hidden" id="card2"
                                            style="height: 300px">
                                            <div class="card-body overflow-auto">
                                                <div class="progress" role="progressbar"
                                                    aria-label="Example 20px high" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100" style="height: 30px">
                                                    <div id="confidenceProgressBar" class="progress-bar fs-5"
                                                        style="width: 0; background-color: #7752FE">
                                                        <span id="confidenceValue">
                                                        </span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div>
                                                    <div id="predictionResult">
                                                        <h2 class="fs-3 fw-bold mb-2" id="predictionText"></h2>
                                                        <p id="confidenceText"></p>
                                                        <p id="confidenceInfo"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="result-textF">
                            <!-- Display detection result here -->
                        </div>
                    </div>
                </div>
            </div>
            <br><br>

            {{-- About --}}
            <div class="card p-4 rounded-5 shadow">
                <div class="card-body">
                    <div>
                        <div class="row align-items-center g-4">
                            <div class="col-md-6 text-center">
                                <img src="images/socialmedia.jpg" class="img-fluid img p-4 rounded-pill"
                                    width="400">
                            </div>
                            <div class="col-md-6" id="about">
                                <h1 class="fw-bold mb-4 header text-center">About <span
                                        class="heading">IntelliGuard</span>
                                </h1>
                                <br>
                                <div id="text-justify">
                                    <p class="mb-4 text-justify">
                                        Welcome to IntelliGuard, your reliable ally in the fight against misinformation.
                                        IntelliGuardGuard is a precision tool designed to help users discern between
                                        real and fake news efficiently. Developed by Izzul, our system relies on an
                                        expertly curated dataset, providing transparent results with clear decision
                                        explanations. We stay ahead of misinformation trends, evolving to tackle new
                                        challenges. VeriGuard is committed to enhancing media literacy and critical
                                        thinking. Trust VeriGuard for a reliable digital news experience.
                                    </p>
                                    <br>
                                    <p class="fst-italic fw-bold text-center">Unmasking the Truth Behind Headlines </p>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <br><br>

            <div id="whyUs"></div>
            {{-- Why Us --}}
            <div class="text-center">
                <h1 class="fw-bold mb-4 header">Why Choose <span class="heading">IntelliGuard</span>?</h1>
                <p class="fs-5">IntelliGuard is not just another fake news detection tool. Here are the reasons why
                    we
                    stand out:</p>
            </div>
            <br>

            <div class="row align-items-center g-4">
                <div class="col-md-4">
                    <div class="card p-2 rounded-5 shadow">
                        <div class="card-body">
                            <center>
                                <div class="px-2 py-4 rounded-circle w-25" id="bg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-database-fill-up" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1" />
                                        <path
                                            d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905" />
                                    </svg>
                                </div>
                            </center>
                            <br>
                            <div class="text-center">
                                <p class="fw-bold">Dynamic and Up-to-Date Dataset</p>
                            </div>
                            <p class="text-justify">
                                We source our dataset from the latest news, ensuring that our system is trained on the
                                most
                                current information available. This dynamic approach enhances accuracy and relevancy.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-2 rounded-5 shadow">
                        <div class="card-body">
                            <center>
                                <div class="px-2 py-4 rounded-circle w-25" id="bg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z" />
                                        <path
                                            d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z" />
                                    </svg>
                                </div>
                            </center>
                            <br>
                            <div class="text-center">
                                <p class="fw-bold">Real-Time News Analysis</p>
                            </div>
                            <p class="text-justify">Experience the power of real-time news analysis. IntelliGuard
                                swiftly
                                evaluates the
                                authenticity of news articles as they are published, giving you timely insights into the
                                credibility of the latest information.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-2 rounded-5 shadow">
                        <div class="card-body">
                            <center>
                                <div class="px-2 py-4 rounded-circle w-25" id="bg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16"
                                        fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                        <path
                                            d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                        <path
                                            d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                                    </svg>
                                </div>
                            </center>
                            <br>
                            <div class="text-center">
                                <p class="fw-bold">User Empowerment</p>
                            </div>
                            <p class="text-justify">IntelliGuard is designed to empower you with the most up-to-date
                                information. We believe in
                                enhancing media literacy and critical thinking by providing accurate and timely insights
                                into the news you consume.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            {{-- Contact --}}

            <div class="card p-4 rounded-5 shadow">
                <div class="card-body">
                    <div class="row">
                        <!-- Left Section -->
                        <div class="col-md-6">
                            <h1 class="fw-bold mb-4 header" id="contact">Get in Touch!</h1>
                            <p class="text-start">Got questions or feedback? I'd love to hear from you!<br>Please use
                                the form below to get
                                in
                                touch.</p>
                            <br>
                            <form id="contactForm">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="yourName"
                                        placeholder="Enter your name">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="yourEmail"
                                        placeholder="Enter your email">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <textarea class="form-control" id="yourMessage" rows="4" placeholder="Enter your message"></textarea>
                                </div>
                            </form>
                            <div class="text-center">
                                <a class="text-decoration-none btn btn-lg fw-bold rounded-pill py-2 px-4 shadow"
                                    id="btn-contact" onclick="submitForm()">
                                    Submit
                                </a>
                            </div>
                        </div>
                        <!-- Right Section -->
                        <div class="col-md-6">
                            <div class="text-center">
                                <img src="images/contact-us.png" class="img-fluid" width="300">
                                <p>Email: izzulqhaleef001@gmail.com</p>
                                <p>Phone: (+60) 113705 8734</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    {{-- Footer --}}
    <footer class="bg-dark text-white">
        <div class="container py-2 text-center">
            © 2024 Izzulqf - All Rights Reserved.
        </div>
    </footer>

    {{-- Modals --}}
    <!-- Button trigger modal -->

    <!-- Headline Modal -->
    <div class="modal fade" id="HeadlineModal" tabindex="-1" aria-labelledby="HeadlineModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="HeadlineModalLabel">Headline Title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please enter the headline title you copied from the particular website:</p>
                    <p>This information will help us analyze and detect the authenticity of the news article.</p>
                    <p><strong>Instructions:</strong></p>
                    <ol>
                        <li>Copy the headline from the source website.</li>
                        <li>Paste it into the input field provided.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Article Modal -->
    <div class="modal fade" id="ArticleModal" tabindex="-1" aria-labelledby="ArticleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ArticleModalLabel">Article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please enter the article content you copied from the particular website:</p>
                    <p>This content is crucial for our analysis. Provide the full article for accurate detection.</p>
                    <p><strong>Instructions:</strong></p>
                    <ol>
                        <li>Copy the entire article from the source website.</li>
                        <li>Paste it into the textarea provided.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Result Modal -->
    <div class="modal fade" id="ResultModal" tabindex="-1" aria-labelledby="ResultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ResultModalLabel">Result</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    For Fake News:<br>
                    1. Confidence Level 0% - 25%: Very Low Confidence (Possibly True)<br>
                    2. Confidence Level 25% - 50%: Low Confidence (Possibly True)<br>
                    3. Confidence Level 50% - 75%: Moderate Confidence (Possibly Fake)<br>
                    4. Confidence Level 75% - 100%: High Confidence (Likely Fake)<br><br>
                    
                    For True News:<br>
                    Confidence Level 0% - 25%: Very Low Confidence (Possibly Fake)<br>
                    Confidence Level 25% - 50%: Low Confidence (Possibly Fake)<br>
                    Confidence Level 50% - 75%: Moderate Confidence (Possibly True)<br>
                    Confidence Level 75% - 100%: High Confidence (Likely True)<br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- End content --}}

    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="app.js"></script>
</body>

</html>
