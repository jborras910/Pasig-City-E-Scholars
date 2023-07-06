<?php 

$page = 'page_faq';
include('includes/dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/restrict.php'); 

 ?>


<style>
.faq-container-fluid {
    padding-top: 3% !important;
    padding-bottom: 8% !important;
    background-color: #003067 !important;
}

.faq-container {
    padding: 10px !important;
    margin: 10px auto;
    color: #fff;

}

.faq-question {

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

    overflow: hidden;
    background: #fff !important;
    color: #000;
    padding: 15px !important;
    display: none;
    border-top: 2px solid black !important;


}

.question i {
    position: absolute;
    top: 50%;
    right: 20px;
    font-size: 30px !important;
    transform: translateY(-50%);
    float: right !important;
}

.faq-container-fluid .fa-circle-question {
    font-size: 100px !important;
    margin-bottom: 26px !important;
}

</style>



<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">FAQ Page</h2>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#faq">
                        Add Frequently Asked Questions
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body activePage" id='activePage'>
            <div class="card-body">
                <?php include('sweetAlert.php');?>
                <form action="Function.php" method="POST">
                    <!-- Modal -->
                    <div class="modal fade" id="faq" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">ALERT</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="group-form">
                                        <label for="">Enter Question</label>
                                        <textarea style="height: 100px" class="form-control" name="question"
                                            placeholder="Question..." required></textarea>
                                    </div>
                                    <br>
                                    <div class="group-form">
                                        <label for="">Enter Answer</label>
                                        <textarea style="height: 200px" class="form-control" type="text" name="answer"
                                            row='4' placeholder="Answer..." required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="add_faq_btn" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="container-fluid">
                    <div class="container faq-container-fluid">

                        <div class="faq-container">
                            <div class="faq-header text-center">
                                <i class="fa-regular fa-circle-question"></i>
                                <h2>Frequently Asked Questions</h2>
                                <p>Get fast answer to your questions. Can't find what you're looking for? Check out our
                                    User Manual
                                    Guide for help</p>
                            </div>
                            <?php 

                                $query = "SELECT * FROM  faq_list";
                                $query_run = mysqli_query($conn,$query);


                                if (mysqli_num_rows($query_run) > 0) {
                                while ($row=mysqli_fetch_assoc($query_run)) {

                                    ?>
                            <div class="faq-question">
                                <div class="question">
                                    <h3 class=""><?php echo $row['question'] ?></h3>


                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit_<?php echo $row['id'] ?>">Edit</button>


                                    <button class="btn btn-warning" data-toggle="modal"
                                        data-target="#remove_<?php echo $row['id'] ?>">Remove</button>






                                    <i class="fa-solid fa-square-caret-down"></i>
                                    <!-- Modal -->
                                    <form action="Function.php" method="POST">

                                        <div class="modal fade" id="edit_<?php echo $row['id'] ?>" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content text-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title " id="exampleModalLongTitle">ALERT
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="group-form">
                                                            <label for="">Question</label>
                                                            <textarea style="height: 100px" class="form-control"
                                                                name="question" placeholder="Question..."
                                                                required><?php echo $row['question'] ?></textarea>
                                                        </div>
                                                        <br>
                                                        <div class="group-form">
                                                            <label for="">Answer</label>
                                                            <textarea style="height: 200px" class="form-control"
                                                                type="text" name="answer" row='4'
                                                                placeholder="Answer..."
                                                                required><?php echo $row['answer'] ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="faq_id"
                                                            value="<?php echo $row['id'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit_faq_btn"
                                                            class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>



                                    <form action="Function.php" method="POST">

                                        <div class="modal fade" id="remove_<?php echo $row['id'] ?>" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content text-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title " id="exampleModalLongTitle">ALERT
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to remove this FAQ list?
                                                        <input type="hidden" name="faq_id"
                                                            value="<?php echo $row['id'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete_faq_btn"
                                                            class="btn btn-danger">Delele
                                                            FAQ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
























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
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>
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
