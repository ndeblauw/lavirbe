---
paths:
  - 'app/Http/Requests/**'
---

# Requests

## Single-filepond fields validate as string, not array
Blue-admin FilePond fields (`$config->filepond`) submit a single encrypted server-id STRING for a single-file collection (e.g. `image`, `banner`), or `existing_file_{id}` on edit with a retained file. Validate as `['nullable', 'string']`. Only use `array`/`name[]` when the field actually supports multiple files (`multiple` on `<x-ba-mediafile>`). An `array` rule on a single upload breaks it with "the image field must be an array".`
