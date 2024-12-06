
<!-- Header --><?php include (TEMPLATEPATH . '/header.php'); ?> <!-- End Header -->
<style>
    /*--------------------------------------------------------------
## Comments
--------------------------------------------------------------*/

.comment-one__title,
.comment-form__title {
    margin: 0;
    color: var(--thm-black);
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 51px;
    text-transform: uppercase;
    letter-spacing: var(--thm-letter-space-small);
}

.comment-one__single {
    display: flex;
    border-bottom: 1px solid #e6e9ef;
    padding-bottom: 60px;
    margin-bottom: 60px;
}

.comment-one__content {
    position: relative;
    margin-left: 45px;
}

.comment-one__content h3 {
    margin: 0;
    font-size: 20px;
    color: var(--thm-black);
    font-weight: 800;
    margin-bottom: 36px;
    text-transform: uppercase;
    letter-spacing: var(--thm-letter-space-small);
}

.comment-one__content p {
    font-weight: 500;
    font-size: 16px;
    margin: 0;
    line-height: 30px;
}

.comment-one__btn {
    font-size: 12px;
    color: var(--thm-base);
    line-height: 40px;
    padding: 2px 20px;
    font-weight: 700;
    letter-spacing: var(--thm-letter-space-big);
    position: absolute;
    top: 0;
    right: 0;
}

.comment-one__btn:hover {
    background-color: var(--thm-black);
    color: var(--thm-base);
    overflow: hidden;
}

.comment-one__image img {
    border-radius: 50%;
    mix-blend-mode: luminosity;
}

.comment-form .comment-form__title {
    margin-top: -6px;
}



.comment-form__input-box {
    position: relative;
    display: block;
}

.comment-form__input-box input[type="text"],
.comment-form__input-box input[type="email"] {
    height: 70px;
    width: 100%;
    border: none;
    background: var(--thm-light);
    ;
    padding-left: 30px;
    padding-right: 60px;
    margin-bottom: 30px;
    border-radius: 0px;
    outline: none;
    font-size: 14px;
    color: var(--thm-gray);
    font-weight: 500;
    display: block;
}

.comment-form__icon {
    position: absolute;
    top: 50%;
    right: 30px;
    bottom: 0;
    transform: translateY(-50%);
}

.comment-form__icon i {
    font-size: 14px;
    color: var(--thm-gray);
}

.contact-expert__icon-comment {
    top: 20px;
    transform: inherit;
}

.comment-form__input-box textarea {
    font-size: 14px;
    color: var(--thm-gray);
    height: 140px;
    width: 100%;
    background: var(--thm-light);
    ;
    padding: 20px 30px 30px;
    border: none;
    border-radius: 0px;
    outline: none;
    margin-bottom: 20px;
    font-weight: 500;
}

.comment-form__btn:hover {
    background: var(--thm-black);
    color: var(--thm-base);
}

/*--------------------------------------------------------------
## Message Box
--------------------------------------------------------------*/
.message-box {
    position: relative;
    display: block;
    padding: 120px 0 120px;
}





.message-box__left .section-title__title {
    font-size: 48px;
    line-height: 58px;
}

.message-box__left .section-title__tagline {
    letter-spacing: 0;
}

.message-box__social {
    display: flex;
    align-items: center;
}

.message-box__social a {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #8f8da0;
    font-size: 17px;
    transition: all 500ms ease;
}

.message-box__social a+a {
    margin-left: 25px;
}

.message-box__social a:hover {
    color: var(--thm-primary);
}
.thm-btn {
    position: relative;
    display: inline-block;
    vertical-align: middle;
    -webkit-appearance: none;
    border: none;
    outline: none !important;
    background-color: #f89f5c;
    color: var(--thm-base);
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 18px 50px;
    transition: 500ms;
    letter-spacing: 0.1em;
}
</style>

<div class="blog-header">
        <h2>Contact</h2>  
</div>	


<!--Message Box Start-->
<div class="col-xl-8 col-lg-7">
    <?php echo do_shortcode('[contact-form-7 id="3d93a76" title="Contact form 1"]');?>                   
</div>
        

       

<!-- Footer --><?php include (TEMPLATEPATH . '/footer.php'); ?> <!-- Footer -->
</body>

</html>