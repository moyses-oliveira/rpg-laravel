export default class PlayerModel {


  cls;
  race;
  id;
  name;
  hp;
  mana;
  avatar;
  level;

  attributes = {
    dexterity: 0,
    strength: 0,
    constitution: 0,
    intelligence: 0,
    wisdom: 0,
    charisma: 0
  }

  skills = [];

  equipments = [];

  user = {
    name: '',
    avatar: ''
  }

  constructor(data) {
    if(!data)
      return;

    this.fill(data)
  }

  fill(data) {
    Object.keys(this).forEach((k) => {
      this[k] = data[k] || this[k]
    })
  }
}

