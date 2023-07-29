updateCat = (id, name) => {
  console.log("updateCat", { id, name });
  elmId = document.getElementById("id");
  elmName = document.getElementById("name");
  elmSubmit = document.getElementById("submit");
  elmId.value = id;
  elmName.value = name;
  elmSubmit.textContent = "save";
};
