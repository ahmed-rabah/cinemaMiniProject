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
    <div class="card m-2" style="width: 18rem;">
            <img src="./images/Up.jpg" class="card-img-top"style="height:18rem;width :17.9rem;" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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