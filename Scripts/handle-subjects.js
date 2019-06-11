function subjectFromDomain(domain) {

    //Using AJAX it is possible to set the following parameters in accordance to what the user set on a database
    if (["TECH", "Technology", "Design and Visual Communication", "Food Technology", "Hard Technology", "Soft Technology", "Digital Technology"].includes(domain)) {
        return "TECH";
    }
    if (["SCIENCE", "Science", "Physics", "Chemistry", "Biology", "Earth and Space", "Agriculture and Horticulture", "Education for sustainablity (Science)"].includes(domain)) {
        return "SCIENCE";
    }
    if (["MATH", "Maths", "Calculus", "Statistics"].includes(domain)) {
        return "MATH";
    }
    if (["ENGLISH", "English", "Media Studies"].includes(domain)) {
        return "ENGLISH";
    }
    if (["SOCSCIENCE", "Social Science", "History", "Classics", "Education for Sustainablity (Social Science)"].includes(domain)) {
        return "SOCSCIENCE";
    }
    if (["ART", "Art", "Visual Art", "Music", "Dance", "Drama"].includes(domain)) {
        return "ART";
    }
    if (["HPE", "Health and Physical Education", "Health", "Physical Education"].includes(domain)) {
        return "HPE";
    }
    if (["LANGUAGE", "Language", "ESOL", "SYM"].includes(domain)) {
        return "LANGUAGE";
    }

}