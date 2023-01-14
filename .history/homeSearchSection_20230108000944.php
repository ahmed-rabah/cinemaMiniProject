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
        <div class="card" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top align-self-center p-1"style="height:18rem;width :17rem; " alt="...">
            <div class="card-body text-center">
                <h4 class="card-title">Zodiac</h4>
                <h6  class="card-text">action</h6>
                <p class="card-text">Some quick example text to build on the card title and make</p>
                <h6  class="card-text m-1">le 12-12-12 à  12:00:00</h6>
                <h5  class="card-text m-0">50dh</h5>
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-primary me-2">ajouter au panier</a>
                    <a href="#" class="btn btn-primary ms-1">voir plus</a>
                </div>
            </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
            <div class="card-body">
                <h5 class="card-title">The Invisible Man</h5>
                <p class="card-text">Cecilia's abusive ex-boyfriend fakes his death</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
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