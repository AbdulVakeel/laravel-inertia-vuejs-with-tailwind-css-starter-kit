
export default function useHelpers() { 

  function convertToTitleCase(text) {
    text = text.replace(/[_-]/g, ' ');

    // Convert to lowercase and split into words
    var words = text.toLowerCase().split(' ');

    // Capitalize the first letter of each word
    for (var i = 0; i < words.length; i++) {
      words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
    }

    var titleCaseText = words.join(' ');

    return titleCaseText;
  }


  return {
    convertToTitleCase,
  };

}
