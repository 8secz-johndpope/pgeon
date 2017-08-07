<?php
// todo clean this up
$answer_count = json_decode($question->answer_count,true);
if (isset($answer_count[0])) {
    $answer_number = $answer_count[0]['total'];
} else  {
    $answer_number = 0;
}
$shown = false;
?>
<!-- Question Container-->



<ul class="media-list media-list-stream c-w-md">
    <li class="media p-a">
        <div class="media-body">
            <ul class="media-list media-list-conversation c-w-md">
                <li class="media m-b-md">
                    <div class="media-body">
                        <div class="media-body-text media-question">  <?php echo $question->question; ?>
{!! ($question->expiring_at) !!}

</div>
                    </div>
                </li>
            </ul>

        </div>
    </li>

</ul>



<!-- END Question Container-->
