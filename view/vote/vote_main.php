<?php

namespace BlimPostSuggestionAndVote\View;

class Vote
{
    /**
     * Show view
     * @param array $vote_data
     * @return string
     */
    static function blim_bpsv_vote_show( $vote_data )
    {

?>
        <div class="voting-box">
            <p>Was this helpful?</p>
            <div id="vote-up" class="blim-vote blim-vote-up">
                <img src="<?php echo BLIM_ASSETSIMG_PATH . '/thumbs-up.png' ?>" alt="">
                <div class="vote-number">
                    <p>
                        <?php echo $vote_data['voteup'] ?>
                    </p>
                </div>
            </div>
            <div id="vote-down" class="blim-vote blim-vote-down">
                <img src="<?php echo BLIM_ASSETSIMG_PATH . '/thumbs-down.png' ?>" alt="">
                <div class="vote-number">
                    <p>
                        <?php echo $vote_data['votedown']  ?>
                    </p>

                </div>
                <input type="hidden" name="voteup" value="<?php echo $vote_data['voteup'] ?>">
                <input type="hidden" name="votedown" value="<?php echo $vote_data['votedown'] ?>">
                <input id='ajax_vote_uri' name='' type='hidden' value='<?php echo BLIM_AJAX_URI . '/update-vote.php' ?>' />

            </div>
            <!-- end of vote -->
        </div>
        <!-- vote end -->
<?php
    }
}
