<select name="" id="">
    <a href="www.google.com"> <option value="1"href="">Op 1</option> </a>
    <option value="2">Op 2</option>
    <option value="3">Op 3</option>
</select>
<script>
    let selectEl = document.getElementsByTagName('select');
    selectEl[0].addEventListener('change', function() {
    location.href= "select.php?id=" + this.value;
});
</script>


<h1>
    TESTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum explicabo dignissimos minima, non quia numquam, obcaecati odio quas a deleniti ab magni. Quaerat delectus fugit enim pariatur perspiciatis saepe veritatis.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, veritatis fuga? Sunt, nesciunt quidem rem quo et reprehenderit excepturi iste itaque deleniti dolores recusandae molestias, autem architecto velit blanditiis cumque?
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, illo aperiam voluptate molestiae laborum porro inventore cupiditate accusamus modi optio corrupti pariatur? Voluptatibus eveniet doloribus libero, exercitationem iusto non accusantium.
</h1>