# Blog-System (Frontend)

A production-ready, static frontend scaffold for a blogging system built with HTML, CSS, Bootstrap 5 and vanilla JavaScript.

This frontend is backend-agnostic and communicates with a PHP backend via REST-style endpoints (placeholders). No build step required — run with PHP's built-in server or any static server.

Contents (generated):

```
Blog-System/
├─ README.md
├─ index.html
├─ post.html
├─ login.html
├─ register.html
├─ dashboard/
│  ├─ index.html
│  ├─ users.html
│  └─ posts.html
├─ user/
│  ├─ profile.html
│  └─ myposts.html
├─ components/
│  ├─ header.html
│  ├─ modals.html
│  └─ footer.html
├─ assets/
│  ├─ css/
│  │  └─ custom.css
│  ├─ js/
│  │  ├─ app.js
│  │  ├─ utils.js
│  │  ├─ auth.js
│  │  ├─ posts.js
│  │  ├─ admin.js
│  │  └─ profile.js
│  └─ img/
│     ├─ placeholder-1.svg
│     ├─ placeholder-2.svg
│     └─ avatar-placeholder.svg
└─ mock/
	├─ posts.list.json
	├─ post.view.json
	├─ users.list.json
	└─ comments.list.json
```

Please see the full project README and API specification in the sections below (this file).

---

## How to run (static preview)

From the `Blog-System` directory run the PHP built-in server (Windows PowerShell):

```powershell
php -S 127.0.0.1:8000
# open http://127.0.0.1:8000
```

Mock mode: `USE_MOCK` is set to `true` by default in `assets/js/utils.js` so the sample credentials included with this scaffold work out-of-the-box.
To switch to a real backend, set `USE_MOCK = false` in `assets/js/utils.js`.

---

## API contract summary

The frontend expects the PHP backend to implement the following endpoints (exact placeholders):

- POST `/api/auth/login.php` — {email, password}
- POST `/api/auth/register.php` — {name, email, password}
- POST `/api/auth/logout.php`
- GET `/api/posts/list.php?page=1&limit=10&search=&tag=&category=&author=`
- GET `/api/posts/view.php?id=123`
- POST `/api/posts/create.php` (FormData)
- POST `/api/posts/update.php` (FormData)
- POST `/api/posts/delete.php`
- GET `/api/users/list.php`
- POST `/api/users/create.php`
- POST `/api/users/update.php`
- POST `/api/users/delete.php`
- POST `/api/comments/create.php`
- POST `/api/comments/update.php`
- POST `/api/comments/delete.php`
- POST `/api/uploads/image.php`

See the "API details" section in this README for sample request and response JSON shapes, status codes, and validation error formats.

---

## Mock data

Use the `mock/` folder when `USE_MOCK` is enabled. The mock files emulate the server JSON for posts, post view, users, and comments.

---

For full documentation, API examples and DB schema suggestions, see the rest of this README in the project root.
