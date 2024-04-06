# Reading Recommendation System
This application recommends books to users based on their reading habits and preferences. It tracks reading progress, sets goals, provides detailed statistics, It's designed to enhance the reading experience for both casual readers and bookworms.


---

## Getting Started

To start the application:-

1- copy `.env.example` file to `.env` file

2- run the following commands:

```sh
docker-compose up -d
```

after the build is complete, get the `container-id` by running the following command:

```sh
docker ps
```

Then to run the migrations and seeders, run the following command:

```sh
docker exec -it <container-id> /bin/sh -c "php artisan migrate --seed"
```
---
# API DOCUMENTATION
This document provides information about the APIs in our application.
## Base URL
All URLs referenced in the documentation have the following base: `{domain}/api`


### Create Reading Interval
- **Description:** This endpoint is used to store a reading interval and calculate book reading pages count.
- **URL:** `/reading-interval`
- **Method:** `POST`
- **Data Params:** 
```json
{
    "user_id": 1,
    "book_id": 1,
    "start_page": 2,
    "end_page": 12
}
```
- **Success Response:**
  - **Code:** 201
  - **Content:** 
    ```json
    {
        "status": "success",
        "message": "Reading interval created successfully"
    }
    ```
- **Error Response:**
  - **Code:** 422
  - **Content:** 
    ```json
    {
        "status": "failed",
        "errors": [
            "The user id field is required."
        ]
    }
    ```

### Get Top 5 Recommended books
- **Description:** Returns a list of recommended books.
- **URL:** `/recommended-books`
- **Method:** `GET`
- **URL Params:** None
- **Success Response:**
  - **Code:** 200
  - **Content:** 
    ```json
        [
            {
                "book_id": "5",
                "book_name": "Clean Code",
                "num_of_read_pages": "100"
            },
            {
                "book_id": "1",
                "book_name": "Harry Potter",
                "num_of_read_pages": "90"
            },
            {
                "book_id": "10",
                "book_name": "The Kite Runner",
                "num_of_read_pages": "20"
            }
        ]
    ```

