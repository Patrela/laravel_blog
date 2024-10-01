//general.js JS general functions
function slugify(text, element_id) {
    let slug = text.value; //innerText
    slug= slug
        .toString()                      // Convert to string (in case a non-string is passed)
        .normalize('NFD')                // Normalize the string
        .toLowerCase()                   // Convert to lowercase
        .trim()                          // Trim whitespace
        .replace(/[\u0300-\u036f]/g, '') // Remove accents/diacritics
        .replace(/[^a-z0-9\s-]/g, '')    // Remove all non-alphanumeric characters except spaces and hyphens
        .replace(/\s+/g, '-')            // Replace spaces with hyphens
        .replace(/-+/g, '-');            // Collapse multiple hyphens into one
    let element= document.getElementById(element_id);
    element.value = slug;
}
