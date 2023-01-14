<main class="">
    <form class="d-flex justify-content-around">
            <div class="form-group">
                <label for="genre" class="form-label mt-4">genre</label>
                <select class="form-select" id="genre">
                    <option value="">All</option>
                    <?php 
            $genres = getAllGenres($pdo);
            foreach ($genres as $genre) {
                echo "<option value=\"".$genre['idGenre']."\">".$genre['libelle']."</option>";
                }
                ?>
        </select>
        </div>
        <div class="form-group">
            <label for="annee" class="form-label mt-4">annee de sortie</label>
            <select class="form-select" id="annee">
                <option value=""></option>
                <?php
            $i=2023;
            while($i >= 1950):
                echo "<option value='$i'>$i</option>";
                $i--;
            endwhile;
            ?>
        </select>
        </div>
        <div class="form-group">
            <label for="projection" class="form-label mt-4"> date de projection</label>
            <input type="date" class="form-control" id="projection" placeholder="projection">
        </div>
        <div class="form-group">
            <label for="movie-name" class="form-label mt-4">nom du film</label>
            <input type="text" class="form-control" id="movie-name" placeholder="entrez le nom du film">
        </div>
    </form>
    <section class="d-flex justify-content-around flex-wrap mt-4 mx-5 bg-dark bg-opacity-25">
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
    <div class="card" style="width: 18rem; height: 30rem;">
  <img src="./images/zodiac.jpg" class="card-img-top" alt="..." style="height:18rem;width :17.9rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>    
    <div class="card m-2" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
            <div class="card m-2" style="width: 18rem;">
                <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
                <div class="card-body">
                    <h5 class="card-title">The Invisible Man</h5>
                    <p class="card-text">Cecilia's abusive ex-boyfriend fakes his death</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
            <div class="card-body">
                <h6>action</h6>
                <h6>le 12-12-12 à  12:00:00</h6>
                <h6>50dh</h6>
                <h5 class="card-title">Zodiac</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div> 
        
    </section>
</main>
                <!-- 
                <style>
                    .grid{
                        display : grid ; 
                        grid-template-columns: auto auto auto;
                        gap: 1.3rem;
                        margin: 1rem ; 
                    }
                    .posters{
                        height: 20rem;
                        width: 20rem;
                    }
                    .programme{
                        width: 25rem;
                        height: 30rem;
                        background: red;
                    }
                    </style>
                <div class="grid text-center">
                    <div class="programme">
                        <img src="./images/zodiac.jpg" class="posters">
                        <h4>Zodiac</h4>
                        <h6>action</h6>
                        <h6>le 12-12-12 à  12:00:00</h6>
                        <h6>50dh</h6>
                    </div>
                    <div class="g-col-6">
                    <img src="./images/zodiac.jpg" class="posters">
        
                    </div>
                    
                    <div class="g-col-6">
                    <img src="./images/zodiac.jpg" class="posters">
        
                    </div>
                    <div class="programme">
                    <img src="./images/zodiac.jpg" class="posters">
        
                    </div>
                </div>
                -->