describe('Data Karyawan', () => {
  it('Create Data', () => {
    cy.visit('/karyawan/create');
    cy.get("h4").should("have.text", "Form Tambah Data Admin Cabang");
    cy.get(":nth-child(2) > label").should("have.text", "Nama Admin Cabang");
    cy.get(":nth-child(3) > label").should("have.text", "Email");
    cy.get(":nth-child(4) > label").should("have.text", "Nama Cabang");
    cy.get(":nth-child(5) > label").should("have.text", "Alamat Admin Cabang");
    cy.get(":nth-child(6) > label").should("have.text", "Alamat Cabang Laundry");
    cy.get(":nth-child(7) > label").should("have.text", "No. Telp Cabang");
    cy.get(":nth-child(8) > label").should("have.text", "Post Image");
    cy.get(".btn").contains("Tambah").and("be.enabled");
    cy.get(".btn").contains("Batal").and("be.enabled");
  });

  it('Read Data', () => {
    cy.visit('/karyawan/{id}');
    cy.get("h4").should("have.text", "Detail Data Admin Cabang");
    cy.get(":nth-child(2) > label").should("have.text", "Nama Admin Cabang");
    cy.get(":nth-child(3) > label").should("have.text", "Email Admin Cabang");
    cy.get(":nth-child(4) > label").should("have.text", "No. Telepon");
    cy.get(":nth-child(5) > label").should("have.text", "Status Admin Cabang");
    cy.get(":nth-child(6) > label").should("have.text", "Alamat Admin Cabang");
    cy.get(":nth-child(7) > label").should("have.text", "Nama Cabang");
    cy.get(":nth-child(8) > label").should("have.text", "Alamat Cabang");
  });

  it('Update Data', () => {
    cy.visit('/karyawan/{id}/edit');
    cy.get("h4").should("have.text", "Form Edit Data Admin Cabang");
    cy.get(":nth-child(2) > label").should("have.text", "Nama");
    cy.get(":nth-child(3) > label").should("have.text", "Email");
    cy.get(":nth-child(4) > label").should("have.text", "Nama Cabang");
    cy.get(":nth-child(5) > label").should("have.text", "No. Telp Cabang");
    cy.get(":nth-child(6) > label").should("have.text", "Status Admin Cabang");
    cy.get(":nth-child(7) > label").should("have.text", "Alamat Admin Cabang");
    cy.get(":nth-child(8) > label").should("have.text", "Alamat Laundry");
    cy.get(".btn").contains("Update").and("be.enabled");
    cy.get(".btn").contains("Cancel").and("be.enabled");
  });
})