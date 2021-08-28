<?php
require_once 'model/Tickets.php';

if(!isset($_GET['page']))
{
    $_GET['page'] = 1;
}

$maxTicketsInPage = 3;
$tickets = GetTickets();
$currentPage = (int)$_GET['page'];
$ticketsCount = count($tickets);

echo '<ul class="list">';
for ($i = 0; $i < $maxTicketsInPage; $i++) {
    $ticketIndex = $maxTicketsInPage * ($currentPage - 1) + $i;
    if($ticketIndex >= $ticketsCount)
        break;
    $ticket = $tickets[$ticketIndex];
    echo '<div class="hat">  
                       ' . $ticket['username'] . ' - ' . $ticket['email'] .
        '<a href="/controller/delete.php?id=' . $ticket['id'] . '">
                           <button class="btn-delete">Delete</button>
                       </a>
                       <a href="/view/edit.php?id=' . $ticket['id'] . '">
                           <button class="btn-edit">Edit</button>                            
                        </a>
                     </div>';
    echo '<li>                                                 
                        <b>
                        ' . $ticket['content'] . '
                        </b>
                        <div class="status-checkbox">                  
                           <input class="form-check-input" type="checkbox"' . (($ticket["progress"] == "1") ? 'checked="1"' : '') . '/>
                        </div>                         
                    </li>';
}
echo '</ul>';


echo '<nav class="page-navigation">
            <ul class="pagination">
                <li class="page-item '.($currentPage>1?'':'disabled').'">
                    <a class="page-link" href="?page='.($currentPage-1).'">Previous</a>
                </li>';
                for($i=0;$i<$ticketsCount/$maxTicketsInPage;$i++)
                {
                    echo '<li class="page-item'.(($currentPage==$i+1)?' active':'').'"><a class="page-link" href="?page='.($i+1).'">'.($i+1).'</a></li>';
                }
                echo '<li class="page-item '.($currentPage<$ticketsCount/$maxTicketsInPage?'':'disabled').'">
                    <a class="page-link" href="?page='.($currentPage+1).'">Next</a>
                </li>
            </ul>
        </nav>';