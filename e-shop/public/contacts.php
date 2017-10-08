<?php

$result = '';
$messageToUser = "Thank you for contacting us! We will get back to you as soon as possible.";

if (isPostRequest()) {
    $infoFromContactForm = array();
    $infoFromContactForm['firstName'] = $_POST['first-name'] ?? '';
    $infoFromContactForm['lastName'] = $_POST['last-name'] ?? '';
    $infoFromContactForm['email'] = $_POST['email'] ?? '';
    $infoFromContactForm['phone'] = $_POST['phone'] ?? '';
    $infoFromContactForm['message'] = $_POST['message'] ?? '';

    $result = insertContactUsFormInfo($infoFromContactForm);

}
else {
    $infoFromContactForm['firstName'] = '';
    $infoFromContactForm['lastName'] = '';
    $infoFromContactForm['email'] = '';
    $infoFromContactForm['phone'] = '';
    $infoFromContactForm['message'] = '';
}

?>

<main>
    <div class="main-content">
        <div class="content-container">
            <h3 class="address">ADDRESS</h3><br><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.</p>
            <br>
            <h3 class="address">Contact form</h3>
            <?php
            if ($result == 'success') {
                echo "<h3 style='color: rgb(188, 26, 26);'>$messageToUser</h3>";
                $infoFromContactForm['firstName'] = '';
                $infoFromContactForm['lastName'] = '';
                $infoFromContactForm['email'] = '';
                $infoFromContactForm['phone'] = '';
                $infoFromContactForm['message'] = '';
            } else {
                displayErrors($result);
            }
            ?>
            <br>
            <div id="contact-form" class="left">
                <div>
                    <h4 class="address">Have a question or just want to get in touch?</h4>
                </div>
                <br>
                <form action="index.php?page=contacts" method="post">
                    <label for="name" class="left">Your name</label>
                    <input type="text" id="name" name="first-name" class="input_form right contact" placeholder="name" required value="<?php echo htmlEscape($infoFromContactForm['firstName']); ?>"><br><br>

                    <label for="name" class="left">Your last name</label>
                    <input type="text" id="name" name="last-name" class="input_form right contact" placeholder="last name" required value="<?php echo htmlEscape($infoFromContactForm['lastName']); ?>"><br><br>

                    <label for="email" class="left">Email</label>
                    <input type="email" id="email" name="email" class="input_form right contact" placeholder="email" required value="<?php echo htmlEscape($infoFromContactForm['email']); ?>"><br><br>

                    <label for="phone" class="eft">Phone number</label>
                    <input type="number" id="phone" name="phone" class="input_form right contact" placeholder="phone" required value="<?php echo htmlEscape($infoFromContactForm['phone']); ?>"><br><br>

                    <label for="message">Your message</label><br>
                    <textarea cols="60" rows="8" name="message"  class="contact" placeholder="message"  required><?php echo htmlEscape($infoFromContactForm['message']); ?></textarea>
                    <button class="right" name="send">Send</button>
                </form>
            </div>
            <div id="iframe" class="right">
                <iframe id="iframeGoogle" class="right"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.4977030551377!2d23.33845061577773!3d42.6508074246826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40aa843d9c9abea9%3A0x532cc281ec4e2a03!2z0YPQuy4g4oCe0J_RgNC-0YTQtdGB0L7RgCDQkNC70LXQutGB0LDQvdC00YrRgCDQpNC-0LvigJwgMiwgMTcwMCDQti7Qui4g0KHRgtGD0LTQtdC90YLRgdC60Lgg0LPRgNCw0LQsINCh0L7RhNC40Y8!5e0!3m2!1sbg!2sbg!4v1503836835480"
                        frameborder="0" allowfullscreen="">
                </iframe>
            </div>
        </div>
    </div>
</main>