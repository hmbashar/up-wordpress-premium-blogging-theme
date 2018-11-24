					<?php
					    if(isset($_GET['author_name'])) :
					        $curauth = get_userdatabylogin($author_name);
					    else :
					        $curauth = get_userdata(intval($author));
					    endif;
					    $user_id = $curauth->ID;
					 
					    $args = array(
					        'user_id' => $user_id,
					        'number' => 10, // how many comments to retrieve
					        'status' => 'approve'
					    );
						 
						$comments = get_comments( $args );
						 
						if ( $comments )
						{
						$output = "<ul>\n";
						foreach ( $comments as $c )
						{
						$output.= '<li>';
						$output.= '<a href="'.get_comment_link( $c->comment_ID ).'">';
						$output.= get_the_title($c->comment_post_ID);
						$output.= '</a>, Posted on: '. mysql2date('m/d/Y', $c->comment_date);
						$output.= "</li>\n";
						}
						$output.= '</ul>';
						 
						echo $output;
						}
						else { echo "No comments made";}
						 
					?>