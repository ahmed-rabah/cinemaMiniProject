
<!--<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>-->

<div class="d-flex">
  

<div class="input-group">
  <div class="input-group-prepend">
    <label class="input-group-text" for="genre">Genre</label>
  </div>
  <select class="custom-select" id="genre">
  <option value="">All</option>
        <?php foreach ($genres as $genre) {
          echo "<option value=\"$genre\">$genre</option>";
        }

        ?>
  </select>
</div>

<div class="form-group">
      <label for="genre" class="form-label mt-4">genre</label>
      <select class="form-select" id="genre">
        <option value="">All</option>
        <?php foreach ($genres as $genre) {
          echo "<option value=\"$genre\">$genre</option>";
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

</div>