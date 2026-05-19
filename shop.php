<?php
          placeholder="Password"
          required
        />
      </div>

      <button type="submit" class="btn auth__submit">
        LOGIN
      </button>

    </form>

    <form
      class="auth__form"
      id="signup-form"
      action="signup.php"
      method="POST"
    >

      <h2>Create Account</h2>

      <div class="input__group">
        <input
          type="text"
          name="fullname"
          placeholder="Full Name"
          required
        />
      </div>

      <div class="input__group">
        <input
          type="email"
          name="email"
          placeholder="Email Address"
          required
        />
      </div>

      <div class="input__group">
        <input
          type="password"
          name="password"
          placeholder="Password"
          required
        />
      </div>

      <button type="submit" class="btn auth__submit">
        SIGN UP
      </button>

    </form>

  </div>

</div>

<script src="https://unpkg.com/scrollreveal"></script>
<script src="main.js"></script>

</body>
</html>