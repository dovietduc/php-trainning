function getAllNews() {

    axios.get('http://localhost:8000/api/v1/home.php',
        { 
            headers: {"Authorization" : `Bearer ${localStorage.getItem('token')}`} 
        }
    )
    .then(function (response) {

        const data = response.data.news;
        let html = '';

        data.forEach(function(item) {
            html += ` <div class="card" style="width: 30%; padding: 10px">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1651454424447-32818532fc83?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=375&q=80" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">${item.name}</h5>
              <p class="card-text">${item.description}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>`
        });

        // dua vao container
        document.querySelector('.flex-wrap').innerHTML = html;

    })
    .catch(function (error) {
        console.log(error);
    });

}

getAllNews();