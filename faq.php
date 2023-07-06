<?php

$page = 'FAQ | Pasig E-Scholar';
include('Head.php');
require_once 'Includes/dbconfig.php';
?>

<style>
body {
    background-image: url(assets/BackgroundTip.jpg);
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
}

.faq-container-fluid {
    padding-top: 7% !important;
    padding-bottom: 8% !important;
}

.faq-container {
    padding: 10px !important;
    margin: 10px auto;
    color: #003067 !important;

}

.faq-question {
    width: 100% !important;

    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
    margin: 20px 0;
    padding: 0px !important;
    border: 2px solid #000 !important;
    background: #fff !important;
}

.question h3 {
    color: white !important;
    font-size: 20px;
}

.question {
    padding: 15px 10px !important;
    margin: 0;

    background: #dd3e2b !important;
    cursor: pointer;
    position: relative;
}

.answer {
    font-size: 20px !important;
    overflow: hidden;
    background: #fff !important;
    color: #000;
    padding: 15px !important;
    display: none;
    border-top: 2px solid black !important;


}

.question i {

    width: 10% !important;
    color: white !important;
    font-size: 30px;

}

.fa-circle-question {
    font-size: 100px !important;
    margin-bottom: 26px !important;
}

@media screen and (max-width: 1000px) {

    .faq-container-fluid {
        padding-top: 25% !important;

    }

    .question h3 {
        color: white !important;
        font-size: 13px !important;
    }

    .question i {
        font-size: 15px !important;
        right: 5px !important;
    }
}

</style>



<?php include('Admin/sweetAlert.php');?>
<div class="container-fluid feedback-main-container mt-5">


    <div class="container-fluid">
        <div class="container faq-container-fluid" data-aos="flip-right">

            <div class="faq-container">
                <div class="faq-header text-center">
                    <i class="fa-regular fa-circle-question"></i>
                    <h2>Frequently Asked Questions</h2>

                </div>
                <?php 

        $query = "SELECT * FROM  faq_list";
        $query_run = mysqli_query($conn,$query);


        if (mysqli_num_rows($query_run) > 0) {
        while ($row=mysqli_fetch_assoc($query_run)) {

            ?>
                <div class="faq-question">
                    <div class="question row">
                        <div class="col-md-11">
                            <h3 class=""><?php echo $row['question'] ?></h3>
                        </div>
                        <div class="col-md-1">
                            <i class="fa-solid fa-square-caret-down"></i>
                        </div>
                    </div>
                    <div class="answer"><?php echo $row['answer'] ?></div>


                </div>
                <?php
        }
        }

        ?>

            </div>






        </div>
    </div>

</div>




<?php 


include('Footer.php');



?>
<script>
const questions = document.querySelectorAll('.question');

questions.forEach(question => {
    question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        if (answer.style.display === 'block') {
            answer.style.display = 'none';


            const icon = question.querySelector('i');
            icon.classList.toggle('fa-square-caret-down');
            icon.classList.toggle('fa-square-caret-up');



        } else {
            answer.style.display = 'block';
            const icon = question.querySelector('i');
            icon.classList.toggle('fa-square-caret-down');
            icon.classList.toggle('fa-square-caret-up');
        }
    });
});
</script>
