
CREATE TABLE IF NOT EXISTS images (
            image_id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            mime_type   TEXT    NOT NULL,
            image_blob         BLOB,
            date_created TEXT NOT NULL
);


