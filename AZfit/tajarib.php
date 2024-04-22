<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Calculator</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Your Website Name</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <form method="post">
                <h2 class="text-center mb-4">Objective Calories</h2>
                <div class="row justify-content-center">
                    <div class="col-sm-4 mb-3">
                        <input class="form-control text-end " name="calories" type="number" value="2000">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-dark btn-block" name="submit">Set Objective</button>
                    </div>
                </div>
            </form>

            <form class="CalculateForm" method="post">
                <h1 class="text-center mb-4">Calorie Calculator (If you don't have experience)</h1>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <h5>Age*</h5>
                                <input class="form-control" name="age" required="" type="number" value="25">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <h5>Gender*</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked="" id="gender_male" name="gender" required="" type="radio" value="0">
                                    <label class="form-check-label" for="gender_male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="gender_female" name="gender" required="" type="radio" value="1">
                                    <label class="form-check-label" for="gender_female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <h5>Body Fat*</h5>
                                <div class="input-group">
                                    <input class="form-control text-end" name="bodyFat" required="" type="number" value="20">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-danger">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Height*</h5>
                                <div class="input-group">
                                    <input class="form-control text-end" name="height" required="" type="number" value="180">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-danger">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5>Weight*</h5>
                                <div class="input-group">
                                    <input class="form-control text-end" name="weight" required="" type="number" value="65">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-danger">kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>Activity*</h5>
                                <select class="form-control" name="activity" required="">
                                    <option value="1">Basal Metabolic Rate (BMR)</option>
                                    <option value="1.2">Sedentary: little or no exercise</option>
                                    <option selected="" value="1.465">Moderate: exercise 4-5 times/week</option>
                                    <option value="1.55">Active: daily exercise or intense exercise 3-4 times/week</option>
                                    <option value="1.725">Very Active: intense exercise 6-7 times/week</option>
                                    <option value="1.9">Extra Active: very intense exercise daily, or physical job</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>BMR Estimation Formula*</h5>
                                <div class="form-check">
                                    <input class="form-check-input" checked="" id="Mifflin_St_Jeor" name="formula" required="" type="radio" value="0">
                                    <label class="form-check-label" for="Mifflin_St_Jeor">Mifflin St Jeor</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="Revised_Harris_Benedict" name="formula" required="" type="radio" value="1">
                                    <label class="form-check-label" for="Revised_Harris_Benedict">Revised Harris-Benedict</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="Katch_McArdle" name="formula" required="" type="radio" value="2">
                                    <label class="form-check-label" for="Katch_McArdle">Katch-McArdle</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ans_calculate"></div>
                <div class="text-center mt-4 card-footer">
                    <button class="btn btn-dark btn-lg" onclick="calculateCalorie(this)" type="button">
                        <i class="fas fa-calculator me-3"></i>
                        Calculate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS (you may need this for certain Bootstrap features) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
