<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "CRM for my buisiness"; ?></title>

    <?php include 'controller/tickets_controller.php'; ?>

    <link rel="stylesheet" href="view/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<div class="wrapper">
    <div class="header-box">
        <nav class="navbar navbar-light">
            <div class="container-fluid justify-content-end">
                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">New Task</button>
                <?php
                if(!isset($_SESSION["session_username"]))
                    echo '<button class="btn btn-light me-2" type="button" onclick="document.location = \'view/login.php\'">Sign In</button>';
                else
                    echo '<button class="btn btn-outline-light me-2" type="button" onclick="document.location = \'controller/logout.php\'">Logout</button>';
                ?>
            </div>
        </nav>

        <!-- Modal -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="controller/tickets_controller.php" method="post">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Email</label>
                                <input type="text" class="form-control" name="email" type="email">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Task</label>
                                <textarea class="form-control" name="content"></textarea>
                            </div>
                            <div>
                                <button type="submit" name="addticket" class="btn btn-primary">Create</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-box">
        <?php
        $tickets = GetTickets();
        echo '<ul class="list">';
        foreach ($tickets as $ticket)
        {
            echo '<div class="hat">  
                       '.$ticket['username'].' - '.$ticket['email'].
                '<a href="/controller/delete.php?id='.$ticket['id'].'">
                           <button class="btn-delete">Delete</button>
                       </a>
                       <a href="/view/edit.php?id='.$ticket['id'].'">
                           <button class="btn-edit">Edit</button>                            
                        </a>
                     </div>';
            echo '<li>                                                 
                        <b>
                        '.$ticket['content'].'
                        </b>
                        <div class="status-checkbox">                  
                           <input class="form-check-input" type="checkbox"'.(($ticket["progress"]=="1")? 'checked="1"':'').'/>
                        </div>                         
                    </li>';
        }
            echo '</ul>';
        ?>
        <nav class="page-navigation">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="footer-box">

    </div>
</div>

</html>