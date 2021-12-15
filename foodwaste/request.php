<h1>We know how to create a request fetch response between backend and frontend</h1>
<h2>We just didn't do it</h2>

<?php 



?>

<section id=posts> 

</section>
<script>

async function loadPosts() {

    const url = "http://localhost:3000/posts.php";
    const response = await fetch(url);
    const data = await response.json();
    console.log(data);
    _posts = data;
    appendPosts(_posts);
}

function appendPosts(posts) {
    let htmlTemplate = "";
  for (const post of posts) {
    htmlTemplate += /*html*/ `
      <article>
        <h3>${post.first_name}: ${post.title}</h3>
        <p>Description: ${post.description}</p>
        <img src=${post.picture}>
      </article>
      `;
  }
  document.querySelector("#posts").innerHTML = htmlTemplate;
}





loadPosts();

</script>
<style>
  section {
    border: solid black 3px;
  }

  section article img {
    max-width: 100px;
  }
  </style>