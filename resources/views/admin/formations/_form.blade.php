<x-ba-text name="title" label="Title" required />
<x-ba-text name="slug" label="Slug" placeholder="Auto-generated from title if empty" />
<x-ba-textarea name="body" label="Body" rte="true" />
<x-ba-boolean name="hidden" label="Hidden" />
<x-ba-tagselect name="tags" label="Tags" :options="\App\Models\Tag::all()->pluck('title', 'id')->toArray()" />

<x-ba-divider subtitle="Banner image" />
<x-ba-mediafile name="banner" label="Banner" />
