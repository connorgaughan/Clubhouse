<?php

add_action('init', 'myStartSession', 1);
add_action('init', 'sendForm', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}

function contactForm(){
	global $wpdb;

	$this_page      =   $_SERVER['REQUEST_URI'];
	$page           =   $_POST['page'];

	if ( $page == NULL ) {
		echo '
			<form method="post" action="' . $this_page .'">
				<div class="single-article">';
    if( !isset($_POST['toDo']) ){
            echo '<h1>Get in Touch</h1>';
        }
    echo'
                    <div class="full">
                        <label for="toDo">What would you like to do?</label>
    					<select name="toDo">
                            <option name="toDo" value="">Please Select...</option>
                            <option name="toDo" value="quote">Request a Quote</option>
                            <option name="toDo" value="work">Work With Us</option>
                            <option name="toDo" value="general">General Contact</option>
                        </select>
                    </div>
                    <div class="full">
					   <input type="hidden" value="1" name="page" />
					   <input type="submit" value="Continue" />
                    </div>
				</div>
			</form>
		';
	}
    elseif ( $page == 1 ) {

        session_start();  
        $_SESSION['toDo'] = $_POST['toDo'];

        if( isset($_SESSION['toDo']) && $_SESSION['toDo'] == "quote" ){
            echo '
                <form method="post" action="' . $this_page .'">
                    <div class="single-article">
                        <p>Project Details</p>
                        <div class="full">
                            <label for="projectName">Project Name</label>
                            <input type="text" name="projectName" />
                        </div>
                        <div class="full">
                            <label for="projectDesc">Project Description</label>
                            <textarea rows="10" name="projectDesc"></textarea>
                        </div>
                        <div class="full">
                            <label for="projectDoc">Project Documents <small>(RFP, RFQ, ect.)</small></label>
                            <input type="file" name="projectDoc" />
                        </div>
                        <div class="full">
                            <label for="">Projected Budget</label>
                            <select name="budget">
                                <option name="budget" value="">Please Select a Range...</option>
                                <option name="budget" value="Less than $1,000">Less than $1,000</option>
                                <option name="budget" value="$1,000 - $5,000">$1,000 - $5,000</option>
                                <option name="budget" value="$5,000 - $10,000">$5,000 - $10,000</option>
                                <option name="budget" value="$10,000 - $20,000">$10,000 - $20,000</option>
                                <option name="budget" value="$20,000 - $50,000">$20,000 - $50,000</option>
                                <option name="budget" value="$50,000+">$50,000+</option>
                                <option name="budget" value="Undefined">Undefined/Not Sure</option>
                            </select>
                        </div>
                        <div class="full">
                            <input type="hidden" value="q2" name="page" />
                            <input type="submit" value="Continue" />
                        </div>
                    </div>
                </form>
            ';
        } elseif( isset($_SESSION['toDo']) && $_SESSION['toDo'] == "work" ){
            echo '
                <form method="post" action="' . $this_page .'">
                    <div class="single-article">
                        <p>Personal Details</p>
                        <div class="third">
                            <label for="fullName">Name</label>
                            <input type="text" name="fullName" />
                        </div>
                        <div class="third">
                            <label for="email">Email</label>
                            <input type="email" name="email" />
                        </div>
                        <div class="third">
                            <label for="link">Link to Portfolio</label>
                            <input type="url" name="link" />
                        </div>
                        <div class="full">
                            <label for="bio">Tell us about yourself.</label>
                            <textarea rows="10" name="bio"></textarea>
                        </div>
                        <div class="full">
                            <input type="hidden" value="w2" name="page" />
                            <input type="submit" value="Submit" />
                        </div>
                    </div>
                </form>
            ';
        } elseif( isset($_SESSION['toDo']) && $_SESSION['toDo'] == "general" ){
            echo '
                <form method="post" action="' . $this_page .'">
                    <div class="single-article">
                        <p>General Inquery</p>

                        <label for="fullName">Name</label>
                        <input type="text" name="fullName" />

                        <label for="email">Email</label>
                        <input type="email" name="email" />

                        <label for="message">Message</label>
                        <textarea rows="10" name="message"></textarea>

                        <input type="hidden" value="g2" name="page" />
                        <input type="submit" value="Submit" />
                    </div>
                </form>
            ';
        } 
    } 
    elseif( $page == 'q2' ){
        session_start();
        $_SESSION['projectName'] = $_POST['projectName'];
        $_SESSION['projectDesc'] = $_POST['projectDesc'];
        $_SESSION['projectDoc']  = $_POST['projectDoc'];
        $_SESSION['budget']      = $_POST['budget'];
        echo '
            <form method="post" action="' . $this_page .'">
                <div class="single-article">
                    <p>Personal Details</p>
                    <div class="third">
                        <label for="fullName">Name</label>
                        <input type="text" name="fullName" />
                    </div>
                    <div class="third">
                        <label for="email">Email</label>
                        <input type="email" name="email" />
                    </div>
                    <div class="third">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" />
                    </div>
                    <div class="full">
                        <input type="hidden" value="q3" name="page" />
                        <input type="submit" value="Submit" />
                    </div>
                </div>
            </form>
        ';
    }
} 
?>