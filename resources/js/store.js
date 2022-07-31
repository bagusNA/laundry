import { reactive } from "vue";

export const store = reactive({
  cart: [],
  total: 0,

  addItem(item) {
    const index = this.findItem(item.id);

    if (index > -1) {
      this.incrementLayanan(null, index);
    }
    else {
      this.insertLayanan(item);
    }
  },

  deleteItem(id) {
    const index = this.findItem(id);
    const item = this.cart[index];

    if (index > -1) this.cart.splice(index, 1);
    this.total -= item.qty * item.harga;
  },

  findItem(id) {
    const index = this.cart.findIndex((cartItem) => cartItem.id === id);
    return index;
  },

  insertLayanan(item) {
    this.cart.push({
      ...item,
      qty: 1,
      subtotal: item.harga,
    });
    this.total += item.harga
  },

  incrementLayanan(id, knownIndex) {
    const index = knownIndex ?? this.findItem(id);
    const item = this.cart[index];

    item.qty++;
    item.subtotal += item.harga;
    this.total += item.harga;
  },

  decrementLayanan(id) {
    const index = this.findItem(id);
    const item = this.cart[index];
    
    if (item.qty <= 1) return;
    item.qty--;
    this.total -= item.harga;
  }
})