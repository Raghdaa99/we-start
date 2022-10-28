<template>
  <div class="about">
    <div class="container">
      <div class="about-info">
        <img src="../assets/banner2.jpg" alt="">
        <h3>About Us</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae unde excepturi id ratione temporibus, officia
          nam accusantium voluptate voluptatem ab.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae unde excepturi id ratione temporibus, officia
          nam accusantium voluptate voluptatem ab.</p>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nihil consequuntur totam rerum inventore.
          Pariatur magni recusandae similique, laudantium, illo maxime libero commodi delectus necessitatibus iste
          ipsum? Ad ipsum facere iusto blanditiis quidem corrupti iure. Laudantium nostrum sit accusamus quia facilis,
          quisquam consequatur sunt architecto natus, repellat sed labore nesciunt deserunt rem explicabo modi odio! Et
          magnam culpa dolore adipisci, magni earum inventore similique sunt aliquid eaque qui, nesciunt perspiciatis ut
          eum tempore praesentium? Odit rem possimus illo sunt distinctio modi tempora architecto, animi magni. Ea
          adipisci illum excepturi, voluptatibus, officia unde assumenda ad quas, debitis sed repellat reprehenderit
          inventore rem dignissimos perspiciatis! Accusantium reiciendis hic voluptatem, quia quas voluptatibus? Facere
          corrupti ducimus consequuntur asperiores dicta ipsa praesentium, ut similique commodi qui porro autem eum
          error facilis iure voluptates repellendus eius? Similique tempora quos nulla harum soluta animi eum laboriosam
          dolorem itaque vitae, doloribus incidunt reprehenderit quam hic iste dolor sit et nam voluptatem vel. Officia
          culpa neque asperiores? Dolorem, illum nesciunt inventore modi nulla quae fugit distinctio libero assumenda,
          vero voluptatibus. Dolores harum reiciendis, necessitatibus magni praesentium voluptas earum labore deserunt
          quo? Aliquam consequuntur ipsa fugit, tempora suscipit nam iusto omnis, iure ab reiciendis illo, velit nihil.
          Earum, obcaecati.</p>
      </div>
      <div class="social">
        <h3>Follow Us</h3>
        <div class="info">
          <div class="media">
            <img src="../assets/icon-fb.png" alt="">
            <span>1800 fans</span>
          </div>
          <div class="media">
            <img src="../assets/icon-tw.png" alt="">
            <span>2000 fans</span>
          </div>
          <div class="media">
            <img src="../assets/icon-ins.png" alt="">
            <span>5255 fans</span>
          </div>
          <div class="media">
            <img src="../assets/icon-yo.png" alt="">
            <span>7000 fans</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.about .container {
  display: flex;
  padding: 50px 20px;
  gap: 50px;
}

.about-info {
  width: 70%;
}
@media (max-width: 767px) {
  .about .container {
       flex-direction: column;
    }
    .about-info {
  width: 100%;
}
}
.about-info img {
  width: 100%;
  height: 400px;
  border-radius: 10px;
}

.about-info p {
  color: #666;
}
.social .info{
  border: 2px solid #dfdfdf;
  border-radius: 10px;
  padding: 20px 30px;
}
.social .info .media {
  margin-top: 15px;
  text-align: center;
  display: flex;
}
.social .info .media img{
  margin-right: 10px;
}
.social .info .media span{
 
}
</style>
