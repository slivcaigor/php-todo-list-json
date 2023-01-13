<script></script>

<template>
  <section class="p-5 d-flex flex-column justify-content-between">
    <div class="ms_upper-part">
      <div class="ms_logo d-flex align-items-center">
        <img src="../assets/logo.png" />
        <h1 class="fw-bolder">todo</h1>
      </div>
      <div class="ms_tags">
        <ul class="gap-4 d-flex flex-column">
          <li>
            <img src="../assets/work.png" />
            work
          </li>
          <li>
            <img src="../assets/study.png" />
            study
          </li>
          <li>
            <img src="../assets/entertainment.png" />
            entertainment
          </li>
          <li>
            <img src="../assets/family.png" />
            family
          </li>
        </ul>
      </div>
      <div class="ms_hidding">
        <div class="form-check">
          <input
            class="form-check-input fs-5"
            type="checkbox"
            value=""
            id="flexCheckDefault"
          />
          <label class="form-check-label" for="flexCheckDefault">
            <h6>Hide Done Tasks</h6>
          </label>
        </div>
      </div>
    </div>
    <div class="ms_avatar">
      <img src="../assets/alien.png" alt="Avatar Picture" />
    </div>
  </section>
</template>

<style lang="scss" scoped>
@use "../styles/general.scss" as *;
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;

section {
  width: 320px;
  height: 100vh;

  .ms_hidding {
    padding-top: 62px;
    padding-left: 15px;
    h6 {
      font-size: 25px;
      cursor: pointer;
      color: $font-second;
    }
    .form-check-input {
      cursor: pointer;
    }
    .form-check-input:active {
      filter: none !important;
    }
    .form-check-input:focus {
      border-color: $font_second !important;
      box-shadow: none !important;
    }
    .form-check-input:checked[type="checkbox"] {
      background-image: url(../assets/spunta.png) !important;
    }
    .form-check-input:checked {
      background-color: transparent !important;
      border-color: $font_second !important;
    }
  }
  .ms_logo {
    img {
      width: 70px;
      margin-right: 20px;
    }
    h1 {
      color: $font_first;
      font-size: 53px;
    }
  }
  .ms_tags {
    padding-top: 53px;
    li {
      font-size: 26px;
      list-style-type: none;
      color: $font_first;
      img {
        width: 40px;
      }
    }
  }
}
</style>
