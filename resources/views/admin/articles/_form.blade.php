<x-ba-text name="title" label="Title" required />
<x-ba-text name="slug" label="Slug" placeholder="Auto-generated from title if empty" />
<x-ba-textarea name="content" label="Content" rte="true" h2h3="true" />
<x-ba-textarea name="meta_description" label="SEO description" placeholder="Korte beschrijving voor zoekmachines (max 160 tekens). Leeg = automatisch afgeleid uit content." />
<x-ba-select name="category_id" label="Category" :options="\App\Models\Category::all()->pluck('title', 'id')->toArray()" />
<x-ba-datepicker name="published_at" label="Published at" />
<x-ba-tagselect name="tags" label="Tags" :options="\App\Models\Tag::all()->pluck('title', 'id')->toArray()" />

<x-ba-divider subtitle="Image" />
<x-ba-mediafile name="image" label="Image" />
