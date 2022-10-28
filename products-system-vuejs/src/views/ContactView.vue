<template>
    <div class="contact">
        <div class="container">
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867266.9977728397!2d34.8920761!3d31.88589545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151cf2d28866bdd9%3A0xee17a001d166f686!2sPalestine!5e0!3m2!1sen!2s!4v1664353522670!5m2!1sen!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="contact-form">
                <div class="form">
                    <form>
                        <div class="input-control">
                            <input type="text" placeholder="Enter your name" id="username" name="username">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <input type="text" placeholder="Enter your email" id="email" name="email">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <textarea placeholder="Comment" id="comment" name="comment" rows="10"></textarea>
                            <div class="error"></div>
                        </div>
                        <button type="submit">Send</button>
                    </form>
                </div>
                <div class="details-address">

                    <div class="media">
                        <span class="contact-info__icon"><i class="fas fa-map-marker-alt fa-fw"></i></span>
                        <div class="media-body">
                            <h3>Palestine. Gaza</h3>
                            <p>Jabalia, CA 10000</p>
                        </div>
                    </div>
                    <div class="media">
                        <span class="contact-info__icon"><i class="fas fa-phone-volume fa-fw"></i></span>
                        <div class="media-body">
                            <h3>+555 235 3554 </h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media">
                        <span class="contact-info__icon"><i class="fas fa-envelope fa-fw"></i></span>
                        <div class="media-body">
                            <h3>raghdaa@gmail.com</h3>
                            <p>Send us your message anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.contact {
    margin: 50px 0 30px;
}

.map {
    width: 100%;
}
.contact-form{
    display: flex;
    justify-content: space-around;
    gap: 40px;
    margin-top: 50px;
}

.details-address{
    align-self: flex-start;
}
.form{
    width: 60%;
}
@media (max-width: 767px) {
    .contact-form{
        flex-direction: column;
    }
    .form{
    width: 100%;
}
}
form input {
    display: block;
    width: 100%;
    padding: 15px;
    background-color: rgb(238, 234, 234);
    margin: 10px 0;
    border: none;
}

form input:first-of-type {
    margin-top: 0;
}

form input:focus,
form textarea:focus {
    /* outline: 2px solid #1d645d; */
    outline: none;
}

form textarea {
    width: 100%;
    display: block;
    /* height: 200px; */
    background-color: rgb(238, 234, 234);
    padding: 15px;
    border: none;
}

form button {
    width: fit-content;
    padding: 15px 30px;
    color: #fff;
    font-weight: bold;
    font-size: 17px;
    margin-top: 12px;
    background-color: #1da1f2;
    border: none;
    cursor: pointer;
}
.media{
    display: flex;
    gap:10px;
    color: #444;
}
.media span{
    font-size: 20px;
 }
.media-body h3{
    margin: 0;
}
</style>