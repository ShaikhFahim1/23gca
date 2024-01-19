
function toggleVote(span) {
    span.classList.toggle('voted');
    const countElement = span.querySelector('.vote-count');
    let count = parseInt(countElement.innerText);

    if (span.classList.contains('voted')) {
        count++;
    } else {
        count--;
    }

    countElement.innerText = count > 0 ? `${count}` : '0';
}



$(document).ready(function() {
    // Toggle between Meme Text and Image
    $('input[name="meme_type"]').change(function() {
        if (this.value === 'text') {
            $('#uploadMemeField').hide();
            $('#memeTextField').show();
            // Make Meme Text required
            $('#memeText').rules('add', {
                required: true,
                messages: {
                    required: "Please enter meme text"
                }
            });
            // Remove rules from Meme Image
            $('#memeFile').rules('remove', 'required');
        } else if (this.value === 'image') {
            $('#uploadMemeField').show();
            $('#memeTextField').hide();
            // Make Meme Image required
            $('#memeFile').rules('add', {
                required: true,
                messages: {
                    required: "Please upload a meme image"
                }
            });
            // Remove rules from Meme Text
            $('#memeText').rules('remove', 'required');
        }
    });
    $('input[name="meme_type"]').change(function() {
        if ($(this).val() === 'meme') {
            $('#uploadMemeField').show();
            $('#memeTextField').hide();
        } else {
            $('#uploadMemeField').hide();
            $('#memeTextField').show();
        }
    });
    // Validate the form using jQuery Validation plugin
    $('#submitForm').validate({
        rules: {
            // Add validation rules as needed
            email: {
                required: true,
                email: true
            },
            terms: {
                required: true
            },
            meme_text: {
                required: function() {
                    return $('input[name="memeType"]:checked').val() === 'text';
                },
                maxlength: 130
            },
            meme: {
                required:true
            }
            // ... (other fields)
        },
        messages: {
            // Add custom error messages as needed
            email: {
                required: 'Please enter a valid email address',
                email: 'Please enter a valid email address'
            },
            meme: "Please upload an image"
            // ... (other fields)
        },
        submitHandler: function(form) {
            // Store form values in cookies
            // document.cookie = 'user_full_name=' + encodeURIComponent($('#full_name').val());
            // document.cookie = 'user_member_id=' + encodeURIComponent($('#member_id').val());
            // document.cookie = 'user_actuarial_association=' + encodeURIComponent($('#actuarial_association').val());
            // document.cookie = 'user_organisation=' + encodeURIComponent($('#organisation').val());
            // document.cookie = 'user_email=' + encodeURIComponent($('#email').val());
            // document.cookie = 'user_contact=' + encodeURIComponent($('#contact').val());

            form.submit();
        }
    });
});


$(document).ready(function() {
    $('.vote-button').each(function() {
        var memeId = $(this).data('meme-id');
        console.log(memeId);

        // Use AJAX to check if the user has already voted for this meme
        $.ajax({
            type: 'POST',
            url: './meme-vote', // Create a separate PHP file (check_vote.php) to check the vote state
            data: {
                memeId: memeId,
                'check_vote': 'true'
            },
            success: function(response) {
                if (response === 'voted') {
                    // Update the vote button state to voted
                    setVotedState(memeId);
                    $('.vote-button[data-meme-id="' + memeId + '"] span.count').append('d');
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });

    $('.vote-button').click(function() {
        var memeId = $(this).data('meme-id');

        // Use AJAX to handle voting
        $.ajax({
            type: 'POST',
            url: './meme-vote',
            data: {
                memeId: memeId,
                'give_vote': 'true'
            },
            success: function(response) {
                // Update the vote count on success
                var countElement = $('.vote-button[data-meme-id="' + memeId + '"] .count');
                var newCount = parseInt(countElement.text());

                if (response === 'Vote recorded successfully') {
                    // Increment vote count
                    newCount++;
                    countElement.text(newCount + ' Voted');
                } else if (response === 'Vote decremented successfully') {
                    // Decrement vote count
                    newCount--;
                    countElement.text(newCount + ' Vote');

                } else {
                    countElement.text(newCount + ' Vote');
                }

                // Update the vote button state
                setVotedState(memeId);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });

    function setVotedState(memeId) {
        // Update the vote button state to voted
        $('.vote-button[data-meme-id="' + memeId + '"]').addClass('voted');

    }
});
